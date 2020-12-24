<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LayananInformasiSearch */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="collapse" id="layanan-informasi-cari">
<div class="layanan-informasi-search card card-body" >

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'created_date') ?>

    <?= $form->field($model, 'kd_jenis_permohonan') ?>

    <?= $form->field($model, 'id_user') ?>

    <?= $form->field($model, 'kebutuhan_informasi') ?>

    <?= $form->field($model, 'tujuan_kebutuhan_informasi') ?>

    <?= $form->field($model, 'id_status') ?>

    <?php // echo $form->field($model, 'last_update') ?>

    <?php // echo $form->field($model, 'jawaban') ?>

    <?php // echo $form->field($model, 'tanggal_jawaban') ?>

    <?= $form->field($model, 'id_admin') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
