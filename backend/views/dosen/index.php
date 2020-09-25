<?php

use yii\grid\GridView;
use yii\helpers\Html;
$this->registerJs('

    $(document).ready(function(){
    $(\'#hapus\').click(function(){

        var HotId = $(\'#w0\').yiiGridView(\'getSelectedRows\');
          $.ajax({
            type: \'POST\',
            url : \'multiple-delete\',
            data : {row_id: HotId},
            success : function(data) {
              $(this).closest(\'tr\').remove(); //or whatever html you use for displaying rows
            }
        });

    });
    });', \yii\web\View::POS_READY);

/* @var $this yii\web\View */
/* @var $searchModel common\models\DosenSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dosen';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dosen-index box box-primary">
    <div class="box-header with-border">
        <?=Html::a('Tambah Dosen', ['create'], ['class' => 'btn btn-success btn-flat'])?>
        <input type="button" class="btn btn-danger" value="Hapus" id="hapus" >

    </div>
    <div class="box-body table-responsive no-padding">
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <?=GridView::widget([
	'dataProvider' => $dataProvider,
	'filterModel' => $searchModel,
	'layout' => "{items}\n{summary}\n{pager}",
	'columns' => [
		['class' => 'yii\grid\CheckboxColumn'],

		['class' => 'yii\grid\SerialColumn'],

		// 'id',
		'nama_dosen',
		'no_hp',
		[
			'attribute' => 'username',
			'value' => 'user.username',
		],
		// 'user.username',

		[
			'class' => 'yii\grid\ActionColumn',
			'template' => '{view}{delete}',
		],
	],
]);?>
    </div>
</div>
