<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Prodi */

$this->title = 'Create Prodi';
$this->params['breadcrumbs'][] = ['label' => 'Prodis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prodi-create box box-primary">
    <div class="box-body">
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>
</div>
