<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Dosen */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dosen-form box box-primary">
    <?php $form = ActiveForm::begin(); ?>
    <div class="box-body table-responsive">

        <?= $form->field($model, 'nama_dosen')->textInput() ?>
        <?= $form->field($model, 'username')->textInput() ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
        <?= $form->field($model, 'email')->textInput() ?>
        <?= $form->field($model, 'no_hp')->textInput() ?>

    </div>
    <div class="box-footer">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('Batal', ['index'], ['class' => 'btn btn-danger btn-flat']) ?>

    </div>
    <?php ActiveForm::end(); ?>
</div>
