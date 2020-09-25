<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = 'Pengguna Baru';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="presensi-index box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Penambahan User Operator</h3>
    </div>
    <div class="box-body">
        <div class="ijin-create">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'email') ?>

            <?= $form->field($model, 'password')->passwordInput() ?>



            <div class="form-group">
                <?= Html::submitButton('Signup', ['class' => 'btn btn-success', 'name' => 'signup-button']) ?>

                <?= Html::a('Batal', ['index'], ['class' => 'btn btn-danger']); ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>

    </div>

</div>
</div>