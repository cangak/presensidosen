<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Jadwal */

$this->title = $model->nama_mata_kuliah;
$this->params['breadcrumbs'][] = ['label' => 'Jadwals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jadwal-view box box-primary">
    <div class="box-header">
        <?= Html::a('Kembali', ['index', 'id' => $model->id], ['class' => 'btn btn-danger btn-flat']) ?>
        <?= Html::a('Tetapkan Verifikator', ['jadwal/verifikator', 'id' => $model->id], ['class' => 'btn btn-info btn-flat']) ?>
        <?= Html::a('Ubah', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-flat']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger btn-flat',
            'data' => [
                'confirm' => 'Anda yakin ingin menghapus item ini?',
                'method' => 'post',
            ],
        ]) ?>
    </div>
    <div class="box-body table-responsive">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'nama_mata_kuliah',
                'sks',
                'hari.hari',
                'waktu_mulai',
                'waktu_selesai',
                'verifikator.nama_verifikator',
            ],
        ]) ?>
        <hr>
        <?= Html::a('Tambah Dosen', ['jadwal/tambah-dosen', 'id' => $model->id], ['class' => 'btn btn-primary pull-right']) ?>
        <h3>Dosen Pengampu</h3>
        <?php if ($model_jadwal_dosen) : ?>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Username</th>
                        <th>Nama Dosen</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($model_jadwal_dosen as $mjd) : ?>
                        <tr>
                            <td>1</td>
                            <td><?= $mjd->dosen->user->username ?></td>
                            <td><?= $mjd->dosen->nama_dosen ?></td>
                            <td><?= Html::a('Hapus', ['jadwal/hapus-dosen', 'id' => $mjd->id], $options = []) ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        <?php endif ?>
    </div>
</div>