<?php

namespace common\modules\imaginary\src;

/**
 * Class GalleryImage
 * This is the model class for table "{{%gallery_image}}"
 *
 * We can use this class in rules:
 *     public function rules()
 *     {
 *         return [
 *             [['mainPhoto'], 'exist', 'skipOnError' => true, 'targetClass' => get_class(Yii::createObject(GalleryImage::class)), 'targetAttribute' => ['mainPhoto' => 'id']],
 *         ];
 *     }
 *
 * @property int $id
 * @property string $type
 * @property string $ownerId
 * @property int $rank
 * @property string $name
 * @property string $description
 *
 * @package bscheshirwork\yii2\galleryManager
 */
class GalleryImage extends \yii\db\ActiveRecord
{
    /**
     * @var null|GalleryBehavior
     */
    public $galleryBehavior = null;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%gallery_image}}';
    }

    /**
     * @param string $version
     *
     * @return string
     */
    public function getUrl($version)
    {
        return $this->galleryBehavior->getUrl($this->id, $version);
    }
}
