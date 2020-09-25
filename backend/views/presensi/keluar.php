<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Presensi */

$this->title = 'Presensi Mata Kuliah ';
$this->params['breadcrumbs'][] = ['label' => 'Presensi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="presensi-view box box-primary">
    <div class="box-header">
        <?= Html::a('Kembali', ['masuk', 'id' => 4], ['class' => 'btn btn-success btn-flat']) ?>
        |
        <?= Html::a('Index Mata Kuliah', ['index', 'id' => 4], ['class' => 'btn btn-info btn-flat']) ?>

    </div>
    <div class="box-body">
        <?php
        $form = ActiveForm::begin([
            'id' => 'active-form',

        ]);

        ?>
        <div class="form-group field-presensi-pokok_bahasan ">
            <label class="control-label" for="presensi-pokok_bahasan">Capaian Pembelajaran Matakuliah</label>
            <textarea id="presensi-pokok_bahasan" class="form-control" name="Presensi[pokok_bahasan]" aria-invalid="false"></textarea>

            <div class="help-block"></div>
        </div>
        <?= $form->field($model, 'pokok_bahasan')->textarea(); ?>
        <?= $form->field($model, 'laporan_kejadian')->textarea()->hint('Apabila terdapat kejadian khusus seperti listrik padam, proyektor tidak menyala, tidak ada perangkat penunjang atau lainnya')->label('Laporan Kejadian (tidak wajib diisi)'); ?>
        <input type="submit" value="Presensi Keluar" class="btn btn-primary">
        <?php ActiveForm::end(); ?>
    </div>
</div>
