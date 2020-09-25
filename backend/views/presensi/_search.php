<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PresensiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="presensi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'jadwal_id') ?>

    <?= $form->field($model, 'waktu_mulai') ?>

    <?= $form->field($model, 'waktu_selesai') ?>

    <?= $form->field($model, 'dosen_id') ?>

    <?php // echo $form->field($model, 'pokok_bahasan') ?>

    <?php // echo $form->field($model, 'status_verifikasi') ?>

    <?php // echo $form->field($model, 'verifikator_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Cari', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
