<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Ijin */

$this->title = 'Tambah Ijin';
$this->params['breadcrumbs'][] = ['label' => 'Ijins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ijin-create">

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
