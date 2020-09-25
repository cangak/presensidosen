<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$opsi = (isset($nama_user)) ? ' : ' . $nama_user : '';

$this->title = 'Reset password ' . $opsi;
?>
<div class="site-reset-password">

    <p>Silahkan masukkan password baru <?=(isset($nama_user)) ? 'untuk user dengan nama <b>' . $nama_user . '</b>' : 'anda'?>:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'reset-password-form']);?>

                <?=$form->field($model, 'password')->passwordInput(['autofocus' => true])?>

                <div class="form-group">
                    <?=Html::submitButton('Simpan', ['class' => 'btn btn-primary'])?>
                </div>

            <?php ActiveForm::end();?>
        </div>
    </div>
</div>

