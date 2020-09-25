<?php

use common\models\Hari;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $model common\models\Jadwal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jadwal-form box box-primary">
    <?php $form = ActiveForm::begin();?>
    <div class="box-body table-responsive">

        <?=$form->field($model, 'nama_mata_kuliah')->textInput(['maxlength' => true])?>

        <?=$form->field($model, 'sks')->textInput(['maxlength' => true], ['type' => 'number'])?>

        <?=
$form->field($model, 'hari_id')->dropDownList(
	ArrayHelper::map(Hari::find()->all(), 'id', 'hari'),
	['prompt' => 'Pilih...']
);
?>



        <div class="form-group field-jadwal-waktu_mulai required">
            <!-- <label class="control-label" for="jadwal-waktu_mulai">Waktu Mulai</label> -->
            <?=$form->field($model, 'waktu_mulai')->widget(MaskedInput::className(), [
	'name' => 'Jadwal[waktu_mulai]',
	'clientOptions' => ['alias' => 'hh:mm:ss'],
]);?>
            <div class="help-block"></div>
        </div>

        <div class="form-group field-jadwal-waktu_mulai required">
            <!-- <label class="control-label" for="jadwal-waktu_mulai">Waktu Selesai</label> -->
             <?=$form->field($model, 'waktu_selesai')->widget(MaskedInput::className(), [
	'name' => 'Jadwal[waktu_selesai]',
	'clientOptions' => ['alias' => 'hh:mm:ss'],
]);?>
            <div class="help-block"></div>
        </div>

    </div>
    <div class="box-footer">
        <?=Html::submitButton('Simpan', ['class' => 'btn btn-success btn-flat'])?>
        <?=Html::a('Batal', ['index'], ['class' => 'btn btn-danger btn-flat'])?>

    </div>
    <?php ActiveForm::end();?>
</div>