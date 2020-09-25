<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel common\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index box box-primary">
    <div class="box-header with-border">
        <?=Html::a('Tambah User', ['create'], ['class' => 'btn btn-success btn-flat'])?>
        <?=Html::a('Tambah Operator', ['create-operator'], ['class' => 'btn btn-info btn-flat'])?>
    </div>
    <div class="box-body table-responsive no-padding">
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <?=GridView::widget([
	'dataProvider' => $dataProvider,
	'filterModel' => $searchModel,
	'layout' => "{items}\n{summary}\n{pager}",
	'columns' => [
		['class' => 'yii\grid\SerialColumn'],

		// 'id',
		'username',
		[
			'label' => 'Hak akses',
			'value' => 'userRole',
		],
		// 'auth_key',
		// 'password_hash',
		// 'password_reset_token',
		// 'email:email',
		// 'status',
		// 'created_at',
		// 'updated_at',
		// 'verification_token',

		[
			'class' => 'yii\grid\ActionColumn',
			// 'template'=>'{view} {changerole} {updatepass}',
			'template' => ' {updatepass}{view}',
			'buttons' => [
				'view' => function ($url, $model) {
					return Html::a('<span class="fa fa-search"></span>', ['user/view', 'id' => $model->id], [
						'class' => 'btn btn-default btn-xs', 'title' => 'Detail',
					]);

				},
				'changerole' => function ($url, $model) {
					return Html::a('<span class="fa fa-edit white"></span>', ['user/update', 'id' => $model->id], [
						'class' => 'btn btn-default btn-xs', 'title' => 'Ganti Role',
					]);

				},

				'updatepass' => function ($url, $model) {
					return Html::a('<span class="fa fa-key white"></span>', ['user/ubah-password', 'id' => $model->id], [
						'class' => 'btn btn-default btn-xs', 'title' => 'Ubah Password',
					]);

				},
			],
		],
	],
]);?>
    </div>
</div>
