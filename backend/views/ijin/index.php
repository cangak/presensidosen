<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\IjinSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ijins';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ijin-index box box-primary">
    <div class="box-header with-border">
        <?= Html::a('Tambah Ijin', ['create'], ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <div class="box-body table-responsive no-padding">
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'layout' => "{items}\n{summary}\n{pager}",
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                'tanggal',
                'jadwal_id',
                'keterangan',
                'file_surat',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>
