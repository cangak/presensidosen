<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Ijin */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ijin-form box box-primary">
    <?php $form = ActiveForm::begin(); ?>
    <div class="box-body table-responsive">

        <?= $form->field($model, 'tanggal')->textInput() ?>

        <?= $form->field($model, 'jadwal_id')->textInput() ?>

        <?= $form->field($model, 'keterangan')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'file_surat')->textInput(['maxlength' => true]) ?>

    </div>
    <div class="box-footer">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('Batal', ['index'], ['class' => 'btn btn-danger btn-flat']) ?>

    </div>
    <?php ActiveForm::end(); ?>
</div>
