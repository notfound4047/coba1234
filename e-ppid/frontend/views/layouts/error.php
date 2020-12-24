<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-error">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>

    <p>
        Maaf, maaf ada kesalahan saat anda mencoba mengakses halaman ini.
    </p>

    <p>
        Silakan kembali ke <a class="btn btn-info">Beranda</a> atau kontak kami jika masih menemui kendala yang sama. Terima Kasih.
    </p>

</div>
