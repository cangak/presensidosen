<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Verifikator */

$this->title = 'Ubah Verifikator: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Verifikators', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="verifikator-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
