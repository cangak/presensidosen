<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\DosenSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dosen';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dosen-index box box-primary">
    <div class="box-header with-border">
        <?= Html::a('Tambah Dosen', ['create'], ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <div class="box-body table-responsive">
        <?php echo $this->render('_search_dosen', ['model' => $searchModel]); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            // 'filterModel' => $searchModel,
            'layout' => "{items}\n{summary}\n{pager}",
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                // 'id',
                'nama_dosen',
                'no_hp',
                // 'user.username',

                [
                    'class' => 'yii\grid\ActionColumn',
                        'template' => '{pilih-dosen}',
                        'buttons' => [
                            'pilih-dosen' => function ($url,$model,$key) {
                                return Html::a(
                                    '<i class="fa fa-check"></i> Pilih', 
                                    $url,['class'=>'btn btn-sm btn-success']);
                            },
                            
                        ],
                        'urlCreator' => function ($action, $model, $key, $index) {
                            if ($action === 'pilih-dosen') {
                                $url ='pilih-dosen?idjadwal='.Yii::$app->request->get("id").'&iddosen='.$key;
                                return $url;
                            }
                        }
                ],
            ],
        ]); ?>
    </div>
</div>
