<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Verifikator */

$this->title = 'Tambah Verifikator';
$this->params['breadcrumbs'][] = ['label' => 'Verifikators', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="verifikator-create">

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
