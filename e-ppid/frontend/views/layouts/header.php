<?php

use common\widgets\Alert;
use frontend\assets\AppAsset;
use frontend\assets\ThemeAsset;
use yeesoft\models\Menu;
use yeesoft\widgets\LanguageSelector;
use yeesoft\widgets\Nav as Navigation;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yeesoft\comment\widgets\RecentComments;
use yeesoft\post\models\Post;
use yeesoft\page\models\Page;
use yeesoft\media\models\Media;
use yii\bootstrap4\Carousel;

Yii::$app->assetManager->forceCopy = true;
AppAsset::register($this);
ThemeAsset::register($this);

?>

<!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <a href="index.html" class="logo mr-auto"><img src="logoppid.png" alt=""></a>
      <nav class="nav-menu d-none d-lg-block">
      <?php
      
      $menuItems = Menu::getMenuItems('main-menu');
        if (Yii::$app->user->isGuest) {
            //$menuItems[] = ['label' => Yii::t('yee/auth', 'Gabung'), 'url' => \yii\helpers\Url::to(['/auth/default/signup'])];
            $menuItems[] = ['label' => Yii::t('yee/auth', 'Masuk'), 'url' => ['/auth/default/login']];
        } else {
            $menuItems[] = [
                'label' => Yii::$app->user->identity->username,
                'url' => ['/auth/default/profile'],
            ];
    
            $menuItems[] = [
                'label' => Yii::t('yee/auth', 'Logout'),
                'url' => ['/auth/default/logout', 'language' => false],
                'linkOptions' => ['data-method' => 'post']
            ];
        }
      
      echo Nav::widget([
        'items' => $menuItems,
        //'options' => ['class' =>''], // set this to nav-tab to get tab-styled navigation
      ]);
      
      ?>
      </nav><!-- .nav-menu -->
      <!--nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="index.html">Home</a></li>
          <li><a href="#about">Profil</a></li>
          <li><a href="#services">Layanan Informasi</a></li>
          <li><a href="#portfolio">Daftar Informasi</a></li>
          <li><a href="#team">Galeri/News</a></li>
          <li class="drop-down"><a href="">Download</a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="drop-down"><a href="#">Deep Drop Down</a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li>
          <li><a href="#contact">Regulasi</a></li>

        </ul>
      </nav><!-- .nav-menu -->
      

    </div>
  </header><!-- End Header -->