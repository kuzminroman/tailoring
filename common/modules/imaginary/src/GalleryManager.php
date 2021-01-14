<?php

namespace common\modules\imaginary\src;

use Yii;
use yii\base\Exception;
use yii\base\Widget;
use yii\db\ActiveRecord;
use yii\helpers\Json;
use yii\helpers\Url;

/**
 * Widget to manage gallery.
 * Requires Twitter Bootstrap styles to work.
 *
 * @author Bogdan Savluk <savluk.bogdan@gmail.com>
 * @author Bogdan Stepanenko <bscheshir.work@gmail.com>
 */
class GalleryManager extends Widget
{
    /** @var ActiveRecord */
    public $model;

    /** @var string */
    public $behaviorName;

    /** @var GalleryBehavior Model of gallery to manage */
    protected $behavior;

    /** @var string Route to gallery controller */
    public $apiRoute = false;

    public $options = [];


    public function init()
    {
        parent::init();
        $this->behavior = $this->model->getBehavior($this->behaviorName);
        $this->registerTranslations();
    }

    public function registerTranslations()
    {
        $i18n = Yii::$app->i18n;
        $i18n->translations['galleryManager/*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => 'en-US',
            'basePath' => '@bscheshirwork/yii2/galleryManager/messages',
            'fileMap' => [],
        ];
    }

    /**
     * {@inheritDoc}
     * Render widget
     * @throws Exception
     */
    public function run()
    {
        if ($this->apiRoute === null) {
            throw new Exception('$apiRoute must be set.', 500);
        }

        $images = [];
        $imageIds = [];
        foreach ($this->behavior->getImages() as $image) {
            $imageIds[] = $image->id;
            $images[] = [
                'id' => $image->id,
                'rank' => $image->rank,
                'name' => (string) $image->name,
                'description' => (string) $image->description,
                'preview' => $image->getUrl('preview'),
            ];
        }

        $baseUrl = [
            $this->apiRoute,
            'type' => $this->behavior->type,
            'behaviorName' => $this->behaviorName,
        ];
        if ($galleryId = $this->behavior->getGalleryId()) {
            $baseUrl['galleryId'] = $galleryId;
        } else {
            Yii::createObject($this->behavior->tempClass)::regenerateTemps($this->behavior->type, $this->behavior->temporaryIndex, $imageIds);
            $baseUrl['temporaryIndex'] = $this->behavior->temporaryIndex;
        }

        $opts = [
            'hasName' => $this->behavior->hasName ? true : false,
            'hasDesc' => $this->behavior->hasDescription ? true : false,
            'uploadUrl' => Url::to($baseUrl + ['action' => 'ajaxUpload']),
            'deleteUrl' => Url::to($baseUrl + ['action' => 'delete']),
            'updateUrl' => Url::to($baseUrl + ['action' => 'changeData']),
            'arrangeUrl' => Url::to($baseUrl + ['action' => 'order']),
            'nameLabel' => Yii::t('galleryManager/main', 'Name'),
            'descriptionLabel' => Yii::t('galleryManager/main', 'Description'),
            'photos' => $images,
        ];

        $opts = Json::encode($opts);
        $view = $this->getView();
        GalleryManagerAsset::register($view);
        $view->registerJs("$('#{$this->id}').galleryManager({$opts});");

        $this->options['id'] = $this->id;
        $this->options['class'] = 'gallery-manager';

        return $this->render('galleryManager');
    }

}
