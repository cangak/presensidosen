<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Presensi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="presensi-form box box-primary">
    <?php $form = ActiveForm::begin(); ?>
    <div class="box-body table-responsive">

        <?= $form->field($model, 'jadwal_id')->textInput() ?>

        <?= $form->field($model, 'waktu_mulai')->textInput() ?>

        <?= $form->field($model, 'waktu_selesai')->textInput() ?>

        <?= $form->field($model, 'dosen_id')->textInput() ?>

        <?= $form->field($model, 'pokok_bahasan')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'status_verifikasi')->textInput() ?>

        <?= $form->field($model, 'verifikator_id')->textInput() ?>

    </div>
    <div class="box-footer">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('Batal', ['index'], ['class' => 'btn btn-danger btn-flat']) ?>

    </div>
    <?php ActiveForm::end(); ?>
</div>
