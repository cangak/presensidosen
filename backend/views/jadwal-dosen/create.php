<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\JadwalDosen */

$this->title = 'Tambah Jadwal Dosen';
$this->params['breadcrumbs'][] = ['label' => 'Jadwal Dosens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jadwal-dosen-create">

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
