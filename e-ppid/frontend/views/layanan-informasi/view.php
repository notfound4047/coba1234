<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;

/* @var $this yii\web\View */
/* @var $model app\models\LayananInformasi */

$this->title = "Detail Permohonan Anda";
$this->params['breadcrumbs'][] = ['label' => 'Layanan Informasi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="layanan-informasi-view">

    <h1><?= Html::encode($this->title) ?></h1>

    

    <?= DetailView::widget([
        'model' => $model,
        
        'attributes' => [
            //'id',
            'created_date:date',
            'kdJenisPermohonan.jenis_layanan_informasi',
            //'id_user',
            'kebutuhan_informasi:ntext',
            'tujuan_kebutuhan_informasi:ntext',
            'status.nama_status',
            'last_update:date',
            'jawaban:html',
            'tanggal_jawaban:date',
            //'id_admin',
        ],
    ]) ?>
    
    <?php 
      
        $dataProvider = new yii\data\ActiveDataProvider([
            'query' => \app\models\HistoryLayananInformasi::find()->where(['id_layanan_informasi'=>$model->id]),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
    
    ?>
    <h2>History Pelayanan</h2>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => false,
        'options' => ['class' => 'table-sm table-striped'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'tanggal:date',
            [
                //'name'  => 'kd_jenis_permohonan',
                'label' => 'Status',
                'value' => function ($model) {
                    return $model->status->nama_status;
                }
            ],
            [
                //'name'  => 'kd_jenis_permohonan',
                'label' => 'Oleh',
                'value' => function ($model) {
                    return $model->user->username;
                }
            ],
        ],
    ]); ?>

</div>
