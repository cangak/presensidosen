<?php

namespace backend\controllers;

use Yii;
use common\models\Presensi;
use common\models\Verifikator;
use common\models\Dosen;
use common\models\Jadwal;
use backend\models\IjinForm;
use common\models\Ijin;
use common\models\PresensiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;


/**
 * PresensiController implements the CRUD actions for Presensi model.
 */
class PresensiController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    // [
                    //     'actions' => ['login', 'error', 'daftar'],
                    //     'allow' => true,
                    // ],
                    [
                        'actions' => [
                            'index',
                            // 'view',
                            // 'create',
                            // 'update',
                            // 'delete',
                            'rekap',
                            'ijin-tidak-mengajar',
                            'masuk',
                            'keluar',
                        ],
                        'allow' => true,
                        'roles' => ['dosen'],
                    ],
                    [
                        'actions' => [
                            'index',

                        ],
                        'allow' => true,
                        'roles' => ['operator'],
                    ],
                    [
                        'actions' => [
                            'verifikasi-presensi',
                            'verifikasi-item',
                            'verifikasikan'
                        ],
                        'allow' => true,
                        'roles' => ['verifikator'],
                    ],

                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Lists all Presensi models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dosen = Dosen::find()->where(['user_id' => Yii::$app->user->id])->one();

        $jadwal = $dosen ? Jadwal::berdasarkanDosen($dosen->id) : false;
        return $this->render('index', [
            'jadwal' => $jadwal,
            // 'searchModel' => $searchModel,
            // 'dataProvider' => $dataProvider,
        ]);
    }



    /**
     * Displays a single Presensi model.
     * @param integer $id
     * @return mixed
     */
    // public function actionView($id)
    // {
    //     return $this->render('view', [
    //         'model' => $this->findModel($id),
    //     ]);
    // }

    /**
     * Creates a new Presensi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    // public function actionCreate()
    // {
    //     $model = new Presensi();

    //     if ($model->load(Yii::$app->request->post()) && $model->save()) {
    //         return $this->redirect(['view', 'id' => $model->id]);
    //     } else {
    //         return $this->render('create', [
    //             'model' => $model,
    //         ]);
    //     }
    // }

    /**
     * Updates an existing Presensi model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    // public function actionUpdate($id)
    // {
    //     $model = $this->findModel($id);

    //     if ($model->load(Yii::$app->request->post()) && $model->save()) {
    //         return $this->redirect(['view', 'id' => $model->id]);
    //     } else {
    //         return $this->render('update', [
    //             'model' => $model,
    //         ]);
    //     }
    // }

    /**
     * Deletes an existing Presensi model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    // public function actionDelete($id)
    // {
    //     $this->findModel($id)->delete();

    //     return $this->redirect(['index']);
    // }

    public function actionRekap($id)
    {
        $model = Presensi::find()->where(['jadwal_id' => $id])->all();
        $model_ijin = Ijin::find()->where(['jadwal_id' => $id])->all();
        $jadwal = Jadwal::findOne($id);

        return $this->render('rekap', [
            'id' => $id,
            'model' => $model,
            'model_ijin' => $model_ijin,
            'jadwal' => $jadwal,
        ]);
    }






    public function actionMasuk($id)
    {
        $model = new Presensi();
        $dosen = Dosen::find()->where(['user_id' => Yii::$app->user->id])->one();
        $jadwal = Jadwal::findOne($id);
        $model->jadwal_id = $jadwal->id;
        $model->waktu_mulai = date('Y-m-d h:i:s');
        $model->dosen_id = $dosen->id;
        $model->status_verifikasi = 1;
        $model->verifikator_id = $jadwal->verifikator_id;
        if ($model->save()) {
            Yii::$app->session->setFlash('success', 'Anda berhasil presensi masuk');
            return $this->redirect(['rekap', 'id' => $id]);
        }

        Yii::$app->session->setFlash('danger', 'Presensi Masuk masih gagal');
        return $this->redirect(['rekap', 'id' => $id]);
    }

    public function actionKeluar($id)
    {
        $model = Presensi::findOne($id);
        if ($model->load(Yii::$app->request->post())) {
            $model->waktu_selesai = date('Y-m-d h:i:s');
            $model->status_verifikasi = 2;
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Anda berhasil presensi keluar');
                return $this->redirect(['rekap', 'id' => $model->jadwal->id]);
            }
            Yii::$app->session->setFlash('danger', 'Anda gagal presensi keluar');
            return $this->redirect(['rekap', 'id' => $model->jadwal->id]);
        }
        return $this->render('keluar', ['model' => $model]);
    }

    public function actionVerifikasiItem($id)
    {
        $model = Presensi::find()->where(['jadwal_id' => $id])->all();
        $jadwal = Jadwal::findOne($id);
        $verifikator = Verifikator::find()->where(['user_id' => Yii::$app->user->id])->one();
        if ($verifikator) {
            if ($jadwal->verifikator_id == $verifikator->id) {
                return $this->render('verifikasi_item', [
                    'id' => $id,
                    'model' => $model,
                    'jadwal' => $jadwal,
                ]);
            } else {
                throw new NotFoundHttpException('Anda bukan verifikator jadwal ini');
            }
        } else {
            throw new NotFoundHttpException('Anda bukan verifikator jadwal ini');
        }
    }

    public function actionVerifikasiPresensi()
    {
        $verifikator = Verifikator::find()->where(['user_id' => Yii::$app->user->id])->one();

        $jadwal = $verifikator ? Jadwal::find()->where(['verifikator_id' => $verifikator->id])->all() : false;
        // echo $verifikator->id;
        return $this->render('verifikasi_presensi', [
            'jadwal' => $jadwal,
            // 'searchModel' => $searchModel,
            // 'dataProvider' => $dataProvider,
        ]);
    }

    public function actionVerifikasikan($id)
    {
        $model = Presensi::findOne($id);

        echo $model->jadwal->verifikator->user_id;
        if ($model->jadwal->verifikator->user_id == Yii::$app->user->id) {
            $model->status_verifikasi = 3;
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Anda berhasil verifikasikan item ini');
                return $this->redirect(['verifikasi-item', 'id' => $model->jadwal->id]);
            }
            Yii::$app->session->setFlash('danger', 'Anda gagal verifikasikan item ini');
            return $this->redirect(['verifikasi-item', 'id' => $model->jadwal->id]);
        } else {
            throw new NotFoundHttpException('Anda bukan verifikator jadwal ini');
        }
    }

    /**
     * Action untuk dosen yang tidak mengajar lengkap dengan attachment surat ijin atau surat tugas
     * @param integer $id merupakan id dari jadwal
     */
    public function actionIjinTidakMengajar($id)
    {
        $model = new IjinForm();
        $dosen = Dosen::find()->where(['user_id' => Yii::$app->user->id])->one();

        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            $model->jadwal_id = $id;
            $model->dosen_id = $dosen->id;
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->simpan()) {
                return $this->redirect(['rekap', 'id' => $id]);
            }
        }

        return $this->render('ijin-tidak-mengajar', ['model' => $model]);
    }

    /**
     * Finds the Presensi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Presensi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Presensi::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
