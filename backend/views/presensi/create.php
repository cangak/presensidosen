<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Presensi */

$this->title = 'Tambah Presensi';
$this->params['breadcrumbs'][] = ['label' => 'Presensis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="presensi-create">

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
