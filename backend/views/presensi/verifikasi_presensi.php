<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PresensiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Presensi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="presensi-index box box-primary">
    <div class="box-header with-border">

        <h3>Verifikasi Presensi Dosen</h3>
    </div>
    <div class="box-body table-responsive">

        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Mata Kuliah</th>
                    <th>Hari</th>
                    <th>Jam</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>

                <?php
                if ($jadwal) :
                    foreach ($jadwal as $jd) :

                ?>
                        <tr>
                            <td>1</td>
                            <td><?= $jd->nama_mata_kuliah ?></td>
                            <td><?= $jd->hari->hari ?></td>
                            <td><?= $jd->waktu_mulai . ' - ' . $jd->waktu_selesai ?></td>
                            <td>
                                <?= Html::a('Verifikasi', ['presensi/verifikasi-item', 'id' => $jd->id], ['class' => 'btn btn-xs btn-success']) ?>
                            </td>
                        </tr>
                <?php
                    endforeach;
                endif;
                ?>
            </tbody>
        </table>
        <?php // echo $this->render('_search', ['model' => $searchModel]); 
        ?>
        <?php
        //echo  GridView::widget([
        //     'dataProvider' => $dataProvider,
        //     'filterModel' => $searchModel,
        //     'layout' => "{items}\n{summary}\n{pager}",
        //     'columns' => [
        //         ['class' => 'yii\grid\SerialColumn'],

        //         'id',
        //         'jadwal_id',
        //         'waktu_mulai',
        //         'waktu_selesai',
        //         'dosen_id',
        //         // 'pokok_bahasan:ntext',
        //         // 'status_verifikasi',
        //         // 'verifikator_id',

        //         ['class' => 'yii\grid\ActionColumn'],
        //     ],
        // ]); 
        ?>
    </div>
</div>