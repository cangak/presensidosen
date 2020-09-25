<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\widgets\Alert;

/* @var $this yii\web\View */
/* @var $model common\models\Presensi */

$this->title = 'Presensi Mata Kuliah ' . $jadwal->nama_mata_kuliah;
$this->params['breadcrumbs'][] = ['label' => 'Presensi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= Alert::widget() ?>

<div class="presensi-view box box-primary">
    <div class="box-header">
        <?= Html::a('Index Mata Kuliah', ['index'], ['class' => 'btn btn-info btn-flat']) ?>
        |
        <?= Html::a('Presensi Masuk', ['masuk', 'id' => $id], ['class' => 'btn btn-success btn-flat']) ?>
        |
        <?= Html::a('Ijin Tidak Mengajar', ['ijin-tidak-mengajar', 'id' => $id], ['class' => 'btn btn-warning btn-flat']) ?>

    </div>
    <div class="box-body table-responsive">
        <h3>
            Histori Mengajar Mata Kuliah <?= $jadwal->nama_mata_kuliah ?>
        </h3>
        <i>Tanda</i> <i class="fa fa-warning fa-blue"></i> <i>menandakan presensi tersebut harus divalidasi oleh validator kelas</i>
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Masuk</th>
                    <th>Keluar</th>
                    <th>Pokok Bahasan</th>
                    <th>Laporan Kejadian</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($model) : ?>
                    <?php $i = 1;
                    foreach ($model as $md) : ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= date('d M Y, h:i:s', strtotime($md->waktu_mulai)) ?></td>
                            <td><?= $md->waktu_selesai ? date('d M Y, h:i:s', strtotime($md->waktu_selesai)) : Html::a('Klik untuk Keluar', ['keluar', 'id' => $md->id], ['class' => 'btn btn-xs btn-primary']) ?></td>
                            <td><?= $md->pokok_bahasan ? $md->pokok_bahasan : "Belum diset" ?>
                                <?php
                                if ($md->status_verifikasi !== 3) {
                                    echo "<i class=\"fa fa-warning fa-blue\"></i>";
                                }
                                ?>

                            </td>
                            <td><?= $md->laporan_kejadian ? $md->laporan_kejadian : '' ?></td>
                        </tr>
                    <?php $i++;
                    endforeach ?>
                <?php endif ?>
            </tbody>

        </table>
        <hr>
        <h3>Histori ijin mengajar</h3>
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tanggal</th>
                    <th>Dosen</th>
                    <th>Keterangan</th>
                    <th>File</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($model_ijin) : ?>
                    <?php $i = 1;
                    foreach ($model_ijin as $mdi) : ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= date('d M Y', strtotime($mdi->tanggal)) ?></td>
                            <td><?= $mdi->dosen ? $mdi->dosen->nama_dosen : '' ?></td>
                            <td><?= $mdi->keterangan ?></td>
                            <td><?= Html::a('File Surat', '../uploads/' . $mdi->file_surat) ?></td>
                        </tr>
                    <?php $i++;
                    endforeach ?>
                <?php endif ?>
            </tbody>

        </table>
    </div>
</div>