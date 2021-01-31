<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'source/dist/main.css',
        'source/plugins/lightslider/src/css/lightslider.css',
        'source/plugins/fancybox/dist/jquery.fancybox.css?v=2.1.7'
    ];
    public $js = [
        'source/plugins/fancybox/dist/jquery.fancybox.js?v=2.1.7',
        'source/plugins/lightslider/src/js/lightslider.js',
        'source/dist/bundle.js',
        'https://yastatic.net/share2/share.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

    public $jsOptions = ['position' => \yii\web\View::POS_END];

}
