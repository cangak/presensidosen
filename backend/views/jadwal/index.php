<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel common\models\JadwalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jadwal';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jadwal-index box box-primary">
    <div class="box-header with-border">
        <?=Html::a('Tambah Jadwal', ['create'], ['class' => 'btn btn-success btn-flat'])?>
    </div>
    <div class="box-body table-responsive no-padding">
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <?=GridView::widget([
	'dataProvider' => $dataProvider,
	'filterModel' => $searchModel,
	'layout' => "{items}\n{summary}\n{pager}",
	'columns' => [
		['class' => 'yii\grid\SerialColumn'],

		'id',
		'nama_mata_kuliah',
		[
			'attribute' => 'hari',
			'value' => 'hari.hari',
		],
		'waktu_mulai',
		'waktu_selesai',
		// 'verifikator_id',

		[
			'class' => 'yii\grid\ActionColumn',
			'template' => '{verifikator} {view} {update} {delete} ',
			'buttons' => [
				'verifikator' => function ($url, $model, $key) {
					return Html::a(
						'<i class="fa fa-handshake-o"></i>',
						$url, ['title' => 'verifikator']);
				},

			],
		],
	],
]);?>
    </div>
</div>
