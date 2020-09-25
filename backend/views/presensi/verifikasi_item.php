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

        <?= Html::a('Index Mata Kuliah', ['verifikasi-presensi'], ['class' => 'btn btn-info btn-flat']) ?>

    </div>
    <div class="box-body table-responsive">
        <h3>
            Histori Mengajar Mata Kuliah <?= $jadwal->nama_mata_kuliah ?>
        </h3>
        Tanda <i class="fa fa-warning fa-blue"></i> menandakan presensi tersebut harus divalidasi oleh verifikator kelas, silahkan anda sebagai verifikator untuk klik verifikasi pada item yang belum diverifikasi
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Masuk</th>
                    <th>Keluar</th>
                    <th>Pokok Bahasan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($model) : ?>
                    <?php $i = 1;
                    foreach ($model as $md) : ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $md->waktu_mulai ?></td>
                            <td><?= $md->waktu_selesai ? $md->waktu_selesai : "Dosen Belum Klik Keluar" ?></td>
                            <td><?= $md->pokok_bahasan ? $md->pokok_bahasan : "Belum diset" ?>
                                <?php
                                if ($md->status_verifikasi !== 3) {
                                    echo "<i class=\"fa fa-warning fa-blue\"></i>";
                                }
                                ?>

                            </td>
                            <td>
                                <?php
                                if ($md->status_verifikasi == $md::TERVERIFIKASI) {
                                    echo "Presensi ini telah terverifikasi";
                                } else {
                                    if ($md->waktu_selesai) {
                                        echo Html::a('Verifikasikan Presensi', ['presensi/verifikasikan', 'id' => $md->id], ['class' => 'btn btn-xs btn-success']);
                                    } else {
                                        echo "Belum Bisa verifikasi karena dosen belum klik keluar";
                                    }
                                }
                                ?>

                            </td>
                        </tr>
                    <?php $i++;
                    endforeach ?>
                <?php endif ?>
            </tbody>

        </table>

    </div>
</div>