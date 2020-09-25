<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Presensi */

$this->title = 'Ubah Presensi: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Presensis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="presensi-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
