<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\VerifikatorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Verifikator '.$modelJadwal->nama_mata_kuliah;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="verifikator-index box box-primary">
    <div class="box-header with-border">
        Silahkan pilih diantara verifikator ini yang ingin anda jadikan verifikator mata kuliah <?= $modelJadwal->nama_mata_kuliah ?> dengan klik link pilih pada nama yang ingin dipilih
    </div>
    <div class="box-body table-responsive">
        <?php  echo $this->render('_search_verifikator', ['model' => $searchModel]); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            // 'filterModel' => $searchModel,
            'layout' => "{items}\n{summary}\n{pager}",
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                // 'id',
                
               
                'nama_verifikator',
                'user.username',
                 [
                    'class' => 'yii\grid\ActionColumn',
                        'template' => '{pilih-verifikator}',
                        'buttons' => [
                            'pilih-verifikator' => function ($url,$model,$key) {
                                return Html::a(
                                    '<i class="fa fa-check"></i> Pilih', 
                                    $url,['class'=>'btn btn-sm btn-success']);
                            },
                            
                        ],
                        'urlCreator' => function ($action, $model, $key, $index) {
                            if ($action === 'pilih-verifikator') {
                                $url ='pilih-verifikator?idjadwal='.Yii::$app->request->get("id").'&idverifikator='.$key;
                                return $url;
                            }
                        }
                ],

            ],
        ]); ?>
    </div>
</div>
