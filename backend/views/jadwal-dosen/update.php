<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\JadwalDosen */

$this->title = 'Ubah Jadwal Dosen: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Jadwal Dosens', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="jadwal-dosen-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
