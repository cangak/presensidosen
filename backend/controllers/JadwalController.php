<?php

namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use common\models\Jadwal;
use common\models\JadwalSearch;
use common\models\JadwalDosen;
use common\models\Verifikator;
use common\models\Dosen;
// use backend\models\DosenBaru;
use common\models\DosenSearch;
// use backend\models\VerifikatorForm;
use common\models\VerifikatorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * JadwalController implements the CRUD actions for Jadwal model.
 */
class JadwalController extends Controller
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
                            'view',
                            'create',
                            'update',
                            'delete',
                            'tambah-dosen',
                            'pilih-dosen',
                            'hapus-dosen',
                            'verifikator',
                            'pilih-verifikator'
                        ],
                        'allow' => true,
                        'roles' => ['root', 'operator'],
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
     * Lists all Jadwal models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new JadwalSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Jadwal model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $model_jadwal_dosen = JadwalDosen::find()->where(['jadwal_id' => $model->id])->all();

        return $this->render('view', [
            'model' => $model,
            'model_jadwal_dosen' => $model_jadwal_dosen,
        ]);
    }

    /**
     * Creates a new Jadwal model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Jadwal();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Jadwal model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Jadwal model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionVerifikator($id)
    {
        $searchModel = new VerifikatorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('verifikator', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'modelJadwal' => $this->findModel($id),

        ]);
    }

    public function actionPilihVerifikator($idjadwal, $idverifikator)
    {
        $model = $this->findModel($idjadwal);
        $model->verifikator_id = $idverifikator;
        if ($model->save()) {
            $this->redirect(['jadwal/view', 'id' => $idjadwal]);
        }
    }

    public function actionTambahDosen($id)
    {
        $searchModel = new DosenSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('tambah_dosen', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionPilihDosen($idjadwal, $iddosen)
    {
        $model = new JadwalDosen();
        $model->jadwal_id = $idjadwal;
        $model->dosen_id = $iddosen;
        if ($model->save()) {
            return $this->redirect(['jadwal/view', 'id' => $idjadwal]);
        }
    }

    public function actionHapusDosen($id)
    {
        if (($model = JadwalDosen::findOne($id)) !== null) {
            $id_jadwal = $model->jadwal_id;
            $model->delete();
            return $this->redirect(['jadwal/view', 'id' => $id_jadwal]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        return $this->redirect(['index']);
    }

    /**
     * Finds the Jadwal model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Jadwal the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Jadwal::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
