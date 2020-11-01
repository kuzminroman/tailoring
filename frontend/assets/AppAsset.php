<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'source/dist/main.css',
        'source/plugins/lightslider/src/css/lightslider.css'
    ];
    public $js = [
        'source/plugins/lightslider/src/js/lightslider.js',
        'source/dist/bundle.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

    public $jsOptions = ['position' => \yii\web\View::POS_END];

}
