<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\JadwalDosen */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jadwal-dosen-form box box-primary">
    <?php $form = ActiveForm::begin(); ?>
    <div class="box-body table-responsive">

        <?= $form->field($model, 'jadwal_id')->textInput() ?>

        <?= $form->field($model, 'dosen_id')->textInput() ?>

    </div>
    <div class="box-footer">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('Batal', ['index'], ['class' => 'btn btn-danger btn-flat']) ?>

    </div>
    <?php ActiveForm::end(); ?>
</div>
