<?php

namespace backend\controllers;

use backend\models\DosenBaru;
use common\models\Dosen;
use common\models\DosenSearch;
use common\models\Jadwal;
use common\models\JadwalDosen;
use common\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * DosenController implements the CRUD actions for Dosen model.
 */
class DosenController extends Controller {

	public function behaviors() {
		return [
			'access' => [
				'class' => AccessControl::className(),
				'rules' => [
					// [
					//     'actions' => ['login', 'error', 'daftar'],
					//     'allow' => true,
					// ],
					[
						'actions' => ['index', 'view', 'create', 'delete', 'multiple-delete'],
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
	public function actions() {
		return [
			'error' => [
				'class' => 'yii\web\ErrorAction',
			],
		];
	}

	/**
	 * Lists all Dosen models.
	 * @return mixed
	 */
	public function actionIndex() {
		$searchModel = new DosenSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

		return $this->render('index', [
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider,
		]);
	}

	/**
	 * Displays a single Dosen model.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionView($id) {
		$jadwal_dosen = JadwalDosen::find()->where(['dosen_id' => $id])->all();
		return $this->render('view', [
			'jadwal_dosen' => $jadwal_dosen,
			'sks' => $this->hitungJumlahSks($jadwal_dosen),
			'model' => $this->findModel($id),
		]);
	}

	protected function hitungJumlahSks($jadwal_dosen) {
		$sks = 0;
		foreach ($jadwal_dosen as $jd) {
			$sks = $sks + $jd->jadwal->sks;
		}
		return $sks;
	}

	/**
	 * Creates a new Dosen model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate() {
		$model = new DosenBaru();

		if ($model->load(Yii::$app->request->post()) && $model->tambahkan()) {
			return $this->redirect(['view', 'id' => $model->id]);
		} else {
			return $this->render('create', [
				'model' => $model,
			]);
		}
	}

	/**
	 * Updates an existing Dosen model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionUpdate($id) {
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
	 * Deletes an existing Dosen model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionDelete($id) {

		$model = $this->findModel($id);
		$user = User::findOne($model->user_id);
		// print_r($model->user_id);
		if ($this->findModel($id)->delete()) {
			$user->delete();
		}

		return $this->redirect(['index']);
	}
	public function actionMultipleDelete() {
		$pk = Yii::$app->request->post('row_id');

		foreach ($pk as $key => $value) {
			$model = $this->findModel($value);
			$user = User::findOne($model->user_id);
			// print_r($model->user_id);
			if ($this->findModel($value)->delete()) {
				$user->delete();
			}
			// $sql = "DELETE FROM hotel WHERE hotel_id = $value";
			// $query = Yii::$app->db->createCommand($sql)->execute();
		}

		return $this->redirect(['index']);

	}

	/**
	 * Finds the Dosen model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return Dosen the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id) {
		if (($model = Dosen::findOne($id)) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}
}
