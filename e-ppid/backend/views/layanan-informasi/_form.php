<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yeesoft\media\widgets\TinyMce;

/* @var $this yii\web\View */
/* @var $model app\models\LayananInformasi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="layanan-informasi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php //$form->field($model, 'created_date')->textInput() ?>

    <?php //$form->field($model, 'kd_jenis_permohonan')->textInput() ?>

    <?php //$form->field($model, 'id_user')->textInput() ?>

    <?= $form->field($model, 'kebutuhan_informasi')->textarea(['rows' => 6, 'disabled'=>'disabled']) ?>

    <?= $form->field($model, 'tujuan_kebutuhan_informasi')->textarea(['rows' => 6, 'disabled'=>'disabled']) ?>
    
    <?= //$form->field($model, 'kd_jenis_permohonan')->textInput() 
    
    $form->field($model, 'id_status')
     ->dropDownList(
            ArrayHelper::map(\app\models\MStatus::find()->asArray()->all(), 'id', 'nama_status')
            )
    ?>
    
    <?= //$form->field($model, 'kd_jenis_permohonan')->textInput() 
    
    $form->field($model, 'id_ekskalasi')
     ->dropDownList(
            ArrayHelper::map(\app\models\User::find()->asArray()->all(), 'id',  function($model) {
                    return $model['first_name'].'-'.$model['last_name'];
                })
            )
    ?>
    
    <?= $form->field($model, 'catatan_internal')->textarea(['rows' => 2 ])->widget(TinyMce::className()) ?>

    <?= $form->field($model, 'jawaban')->textarea(['rows' => 6])->widget(TinyMce::className()) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
