<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\MLayananInformasi;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\LayananInformasi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="layanan-informasi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php // $form->field($model, 'created_date')->textInput() ?>

    <?= //$form->field($model, 'kd_jenis_permohonan')->textInput() 
    
    $form->field($model, 'kd_jenis_permohonan')
     ->dropDownList(
            ArrayHelper::map(MLayananInformasi::find()->asArray()->all(), 'id', 'jenis_layanan_informasi')
            )
    ?>

    <?php //$form->field($model, 'id_user')->textInput() ?>

    <?= $form->field($model, 'kebutuhan_informasi')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'tujuan_kebutuhan_informasi')->textarea(['rows' => 6]) ?>

    <?php //$form->field($model, 'id_status')->textInput() ?>

    <?php //$form->field($model, 'last_update')->textInput() ?>

    <?php //$form->field($model, 'jawaban')->textarea(['rows' => 6]) ?>

    <?php //$form->field($model, 'tanggal_jawaban')->textInput() ?>

    <?php //$form->field($model, 'id_admin')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
