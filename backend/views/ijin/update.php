<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Ijin */

$this->title = 'Ubah Ijin: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ijins', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ijin-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
