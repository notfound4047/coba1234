<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\LayananInformasiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Permohonan Informasi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="layanan-informasi-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <div class="form-group">
    <a class="btn btn-primary" data-toggle="collapse" href="#layanan-informasi-cari" role="button" aria-expanded="false" aria-controls="collapseExample">
    Pencarian
    </a>
    </div>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'created_date',
            [
                //'name'  => 'kd_jenis_permohonan',
                'label' => 'Jenis Permohonan',
                'value' => function ($model) {
                    return $model->kdJenisPermohonan->jenis_layanan_informasi;
                }
            ],
            [
                //'name'  => 'kd_jenis_permohonan',
                'label' => 'Pemohon',
                'value' => function ($model) {
                    return $model->user->username . $model->user->skype;
                }
            ],
            'kebutuhan_informasi:ntext',
            'tujuan_kebutuhan_informasi:ntext',
            [
                //'name'  => 'kd_jenis_permohonan',
                'label' => 'Pemohon',
                'format'=> 'raw',
                'value' => function ($model) {
                    $html = "";
                    switch($model->id_status){
                        case 1:
                            $html.='<span class="label label-warning">'.$model->status->nama_status.'</span>';
                            break;
                        case 2:
                            $html.='<span class="label label-success">'.$model->status->nama_status.'</span>';
                            break;
                    }
                    return $html;
                }
            ],
            'last_update',
            //'jawaban:ntext',
            //'tanggal_jawaban',
            //'id_admin',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
