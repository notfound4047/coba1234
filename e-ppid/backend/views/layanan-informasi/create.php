<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LayananInformasi */

$this->title = 'Create Layanan Informasi';
$this->params['breadcrumbs'][] = ['label' => 'Layanan Informasis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="layanan-informasi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
