<?php
/* @var $this \yii\web\View */
/* @var $content string */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use frontend\assets\ThemeAsset;
use yeesoft\models\Menu;
use yeesoft\widgets\LanguageSelector;
use yeesoft\widgets\Nav as Navigation;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\helpers\Html;
use yii\bootstrap4\Breadcrumbs;
use yeesoft\comment\widgets\RecentComments;
use yeesoft\post\models\Post;
use yeesoft\page\models\Page;
use yeesoft\media\models\Media;
use yii\bootstrap4\Carousel;

Yii::$app->assetManager->forceCopy = true;
AppAsset::register($this);
ThemeAsset::register($this);
$this->title = 'Beranda';

$profil = Page::find()->where(['slug' => 'profil-ppid'])->one();
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-none d-lg-flex align-items-center fixed-top">
    <div class="container d-flex">
      <div class="contact-info mr-auto">
        <i class="icofont-envelope"></i> <a href="mailto:<?= Yii::$app->settings->get('general.email', 'a') ?>"><?= Yii::$app->settings->get('general.email', 'a') ?></a>
        <i class="icofont-phone"></i> <?= Yii::$app->settings->get('general.telepon', 'a') ?>
      </div>
      <div class="social-links">
        <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
        <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
        <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
        <a href="#" class="skype"><i class="icofont-skype"></i></a>
        <a href="#" class="linkedin"><i class="icofont-linkedin"></i></i></a>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <a href="index.html" class="logo mr-auto"><img src="logoppid.png" alt=""></a>
      <nav class="nav-menu d-none d-lg-block">
      <?php
      
      $menuItems = Menu::getMenuItems('main-menu');
        if (Yii::$app->user->isGuest) {
            $menuItems[] = ['label' => Yii::t('yee/auth', 'Gabung'), 'url' => \yii\helpers\Url::to(['/auth/default/signup'])];
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
        'options' => ['class' =>''], // set this to nav-tab to get tab-styled navigation
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

  <main id="main" data-aos="fade-up">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2><?= $this->title; ?></h2>
          <?= Breadcrumbs::widget([
            'itemTemplate' => "<li><i>{link}</i></li>\n", // template for all links
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [], 
            'options' => ['class' =>''],
            ])
            ?>  
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
      <div class="container">
        <?= $content ?>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">


    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Dinas Kominfo <br /><span>Provinsi Jawa Timur.</span></h3>
            <p>
              Jl. Ahmad Yani No.242-244, Gayungan, Kec. Gayungan, Kota SBY,  <br>
              Jawa Timur 60235 <br>
              Indonesia <br><br>
              <strong>Phone:</strong> (031) 8294608<br>
              <strong>Email:</strong> ppid-kominfo@jatimprov.go.id<br>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Link</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Dinas Kominfo Prov. Jawa Timur</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Official Site Prov. Jawa Timur</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">PPID Provinsi Jawa Timur</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Layanan Kami</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Prosedur Permohonan Informasi</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Prosedur Keluhan Informasi</a></li>

            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Media Sosial</h4>
            <p>Ikuti perkembangan dan berita terbaru dari PPID Dinas Kominfo Prov Jawa Timur dengan Follow akun media sosial kami</p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container py-4">
      <div class="copyright">
        &copy; Copyright <strong><span>Dinas Komunikasi dan Informatika</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bizland-bootstrap-business-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
