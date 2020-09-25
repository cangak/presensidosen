<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Presensi */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Presensis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="presensi-view box box-primary">
    <div class="box-header">
        <?= Html::a('Kembali', ['index', 'id' => $model->id], ['class' => 'btn btn-danger btn-flat']) ?>
        <?= Html::a('Ubah', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-flat']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger btn-flat',
            'data' => [
                'confirm' => 'Anda yakin ingin menghapus item ini?',
                'method' => 'post',
            ],
        ]) ?>
    </div>
    <div class="box-body table-responsive no-padding">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'jadwal_id',
                'waktu_mulai',
                'waktu_selesai',
                'dosen_id',
                'pokok_bahasan:ntext',
                'status_verifikasi',
                'verifikator_id',
            ],
        ]) ?>
    </div>
</div>
