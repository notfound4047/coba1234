<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\LayananInformasiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Permohonan Informasi';
$this->params['breadcrumbs'][] = $this->title;

$this->registerCss(<<<css
.hori-timeline .events {
    border-top: 3px solid #e9ecef;
}
.hori-timeline .events .event-list {
    display: block;
    position: relative;
    text-align: center;
    padding-top: 70px;
    margin-right: 0;
}
.hori-timeline .events .event-list:before {
    content: "";
    position: absolute;
    height: 36px;
    border-right: 2px dashed #dee2e6;
    top: 0;
}
.hori-timeline .events .event-list .event-date {
    position: absolute;
    top: 38px;
    left: 0;
    right: 0;
    width: 75px;
    margin: 0 auto;
    border-radius: 4px;
    padding: 2px 4px;
}
@media (min-width: 1140px) {
    .hori-timeline .events .event-list {
        display: inline-block;
        width: 24%;
        padding-top: 45px;
    }
    .hori-timeline .events .event-list .event-date {
        top: -12px;
    }
}
.bg-soft-primary {
    background-color: rgba(64,144,203,.3)!important;
}
.bg-soft-success {
    background-color: rgba(71,189,154,.3)!important;
}
.bg-soft-danger {
    background-color: rgba(231,76,94,.3)!important;
}
.bg-soft-warning {
    background-color: rgba(249,213,112,.3)!important;
}
.card {
    border: none;
    margin-bottom: 24px;
    -webkit-box-shadow: 0 0 13px 0 rgba(236,236,241,.44);
    box-shadow: 0 0 13px 0 rgba(236,236,241,.44);
}

css
)

?>

<div class="container-fluid">
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-5">Checklist Pengajuan Informasi Daring</h4>

                <div class="hori-timeline" dir="ltr">
                    <ul class="list-inline events">
                        <li class="list-inline-item event-list">
                            <div class="px-4">
                                <div class="event-date bg-soft-primary text-primary">2 June</div>
                                <h5 class="font-size-16">Registrasi Akun</h5>
                                <p class="text-muted">It will be as simple as occidental in fact it will be Occidental Cambridge friend</p>
                                <div>
                                    <a href="#" class="btn btn-primary btn-sm">Read more</a>
                                </div>
                            </div>
                        </li>
                        <li class="list-inline-item event-list">
                            <div class="px-4">
                                <div class="event-date bg-soft-success text-success">5 June</div>
                                <h5 class="font-size-16">Verifikasi Email</h5>
                                <p class="text-muted">Everyone realizes why a new common language one could refuse translators.</p>
                                <div>
                                    <a href="#" class="btn btn-primary btn-sm">Read more</a>
                                </div>
                            </div>
                        </li>
                        <li class="list-inline-item event-list">
                            <div class="px-4">
                                <div class="event-date bg-soft-danger text-danger">7 June</div>
                                <h5 class="font-size-16">Upload Berkas</h5>
                                <p class="text-muted">If several languages coalesce the grammar of the resulting simple and regular</p>
                                <div>
                                    <a href="#" class="btn btn-primary btn-sm">Read more</a>
                                </div>
                            </div>
                        </li>
                        <li class="list-inline-item event-list">
                            <div class="px-4">
                                <div class="event-date bg-soft-warning text-warning">8 June</div>
                                <h5 class="font-size-16">Verifikasi Berkas</h5>
                                <p class="text-muted">Languages only differ in their pronunciation and their most common words.</p>
                                <div>
                                    <a href="#" class="btn btn-primary btn-sm">Read more</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- end card -->
    </div>
</div>

<div class="layanan-informasi-index">


    <h2><?= Html::encode($this->title) ?></h2>
    
    
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Buat Permohonan Informasi Anda', ['create'], ['class' => 'btn btn-info']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'options'   =>  ['class' => 'table-sm table-striped'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'created_date:date',
            [
                //'name'  => 'kd_jenis_permohonan',
                'label' => 'Jenis Permohonan',
                'value' => function ($model) {
                    return $model->kdJenisPermohonan->jenis_layanan_informasi;
                }
            ],
            //'id_user',
            'kebutuhan_informasi:ntext',
            'tujuan_kebutuhan_informasi:ntext',
            [
                //'name'  => 'kd_jenis_permohonan',
                'label' => 'Status Permohonan',
                'value' => function ($model) {
                    return $model->status->nama_status;
                }
            ],
            'last_update:date',
            //'jawaban:ntext',
            //'tanggal_jawaban:date',
            //'id_admin',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
                'buttons' => ['view' => function($url, $model) {
            	    return Html::a('<span class="btn btn-md btn-default"><b class="fa fa-search-plus"></b></span>', ['view', 'id' => $model['id']], ['title' => 'View', 'id' => 'modal-btn-view']);
            	},
            	
            	
                ]
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
