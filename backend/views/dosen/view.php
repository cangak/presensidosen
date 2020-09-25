<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Dosen */

$this->title = $model->nama_dosen;
$this->params['breadcrumbs'][] = ['label' => 'Dosen', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dosen-view box box-primary">
    <div class="box-header">
        <?= Html::a('Kembali', ['index', 'id' => $model->id], ['class' => 'btn btn-success btn-flat']) ?>
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
                'nama_dosen',
                'no_hp',
                'user.username',
                'user.email',
            ],
        ]) ?>
    </div>
</div>
<div class="box box-success">
    <div class="box-header">
        <h3>Jadwal Mengajar</h3>
        <span class="pull-right">Total Sks : <?= $sks ?> sks</span>
    </div>
    <div class="box-body table-responsive table-bordered">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Mata Kuliah</th>
                    <th>SKS</th>
                    <th>Hari</th>
                    <th>Waktu</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($jadwal_dosen as $jd) : ?>
                    <tr>
                        <td><?= $jd->id ?></td>
                        <td><?= $jd->jadwal->nama_mata_kuliah ?></td>
                        <td><?= $jd->jadwal->sks ?></td>
                        <td><?= $jd->jadwal->hari->hari ?></td>
                        <td><?= $jd->jadwal->waktu_mulai . ' - ' . $jd->jadwal->waktu_selesai ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>