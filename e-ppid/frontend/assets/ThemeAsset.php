<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use Yii;
use yii\web\AssetBundle;
use yii\web\View;

class ThemeAsset extends AssetBundle
{

    public $css = [
        'css/style.css',
        'vendor/icofont/icofont.min.css',
        'vendor/boxicons/css/boxicons.min.css',
        'vendor/owl.carousel/assets/owl.carousel.min.css',
        'vendor/venobox/venobox.css',
        'vendor/aos/aos.css',
    ];
    public $js = [
        'vendor/jquery.easing/jquery.easing.min.js',
        'vendor/php-email-form/validate.js',
        'vendor/waypoints/jquery.waypoints.min.js',
        'vendor/counterup/counterup.min.js',
        'vendor/owl.carousel/owl.carousel.min.js',
        'vendor/isotope-layout/isotope.pkgd.min.js',
        'vendor/venobox/venobox.min.js',
        'vendor/aos/aos.js',
        'js/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
        'frontend\assets\AppAsset',
        'rmrevin\yii\fontawesome\AssetBundle',
    ];

    public function init()
    {
        parent::init();
        if (isset(Yii::$app->view->theme->basePath)) {
            $this->sourcePath = Yii::$app->view->theme->basePath;
        }
    }

    /**
     * Registers this asset bundle with a view.
     * @param \yii\web\View $view the view to be registered with
     * @return static the registered asset bundle instance
     */
    public static function register($view)
    {
$js = <<<JS
            $('[data-toggle="tooltip"]').tooltip()
JS;

        $view->registerJs($js, View::POS_READY);

        return parent::register($view);
    }
}