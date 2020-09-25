<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>



<div class="register-box">
  <div class="register-logo">
    <a href="../../index2.html"><b>LPPD</b> Kapuas Hulu</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Daftarkan Akun Baru</p>

    <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
      <div class="form-group has-feedback">
        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
      </div>
      <div class="form-group has-feedback">
        <?= $form->field($model, 'email') ?>
      </div>
      <div class="form-group has-feedback">
        <?= $form->field($model, 'password')->passwordInput() ?>
      </div>
      
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> Saya Setuju Untuk Mendaftar
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
            <?= Html::submitButton('Daftar', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
        </div>
        <!-- /.col -->
      </div>
    <?php ActiveForm::end(); ?>

    <a href="site/login" class="text-center">Saya sudah punya akun</a>
  </div>
  <!-- /.form-box -->
</div>
