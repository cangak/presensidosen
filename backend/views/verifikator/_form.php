<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Verifikator */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="verifikator-form box box-primary">
    <?php $form = ActiveForm::begin(); ?>
    <div class="box-body table-responsive">

        <?= $form->field($model, 'nama_verifikator')->textInput() ?>
        <?= $form->field($model, 'username')->textInput() ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
        <?= $form->field($model, 'email')->textInput() ?>


    </div>
    <div class="box-footer">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('Batal', ['index'], ['class' => 'btn btn-danger btn-flat']) ?>

    </div>
    <?php ActiveForm::end(); ?>
</div>
