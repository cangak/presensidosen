<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel common\models\VerifikatorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Verifikator';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="verifikator-index box box-primary">
    <div class="box-header with-border">
        <?=Html::a('Tambah Verifikator', ['create'], ['class' => 'btn btn-success btn-flat'])?>
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
		'nama_verifikator',
		// 'user.username',
		[
			'attribute' => 'username',
			'value' => 'user.username',
		],

		['class' => 'yii\grid\ActionColumn'],
	],
]);?>
    </div>
</div>
