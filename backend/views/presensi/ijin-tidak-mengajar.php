<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;



/* @var $this yii\web\View */
/* @var $searchModel common\models\PresensiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Presensi :: Ijin Tidak Mengajar';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="presensi-index box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Form Ijin Tidak Mengajar</h3>
    </div>
    <div class="box-body">
        <div class="ijin-create">

            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
            <div class="form-group field-tanggal required">
                <label class="control-label" for="tanggal">Tanggal (contoh: 2020-12-31)</label>
                <?= MaskedInput::widget([
                    'name' => 'IjinForm[tanggal]',
                    'clientOptions' => ['alias' =>  'yyyy-mm-dd']
                ]); ?>
                <div class="help-block"></div>
            </div>

            <?= $form->field($model, 'keterangan')->textarea() ?>

            <?= $form->field($model, 'imageFile')->fileInput() ?>

            <button>Submit</button>

            <?php ActiveForm::end() ?>

        </div>

    </div>

</div>
</div>