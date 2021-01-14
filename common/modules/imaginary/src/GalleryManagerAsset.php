<?php

namespace common\modules\imaginary\src;

use Yii;
use yii\web\AssetBundle;

class GalleryManagerAsset extends AssetBundle
{
    public $sourcePath = '@bscheshirwork/yii2/galleryManager/assets';
    public $js = YII_DEBUG ? [
        'jquery.iframe-transport.js',
        'jquery.galleryManager.js',
    ] : [
        'jquery.iframe-transport.min.js',
        'jquery.galleryManager.min.js',
    ];
    public $css = [
        'galleryManager.css',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\jui\JuiAsset',
    ];
}
