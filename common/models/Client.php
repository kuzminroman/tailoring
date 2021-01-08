<?php

namespace common\models;

use common\modules\tag\models\Tag;
use Yii;
use yii\helpers\ArrayHelper;
use zxbodya\yii2\galleryManager\GalleryBehavior;

/**
 * This is the model class for table "client".
 *
 * @property int $id
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $middle_name
 * @property int|null $gender
 * @property string|null $description
 * @property int|null $type
 * @property string|null $date_create
 * @property string|null $date_update
 * @property string|null $seo_title
 * @property string|null $seo_keywords
 * @property string|null $seo_description
 * @property int $city
 * @property int $user_id
 * @property int $address
 * @property int $status
 * @property int|null $approve
 *
 * @property tagRelations[] $tagRelations
 * @property phonesRelations[] $phonesRelations
 * @property activitiesRelations[] $activitiesRelations
 **/

class Client extends \yii\db\ActiveRecord
{
    public const STATUS_ACTIVE = 0;
    public const STATUS_DEL = 1;

    public $tags = [];
    public $phones = [];
    public $activities = [];

    public static $typeClients = [
        1 => 'Ателье',
        2 => 'Самозанятый',
        3 => 'Заказчик',
    ];

    public static $gender = [
        1 => 'Женский',
        2 => 'Мужской'
    ];

   public static $approve = [
        1 => 'Модерация',
        2 => 'Опубликован',
        3 => 'Снят с публикации'
    ];

    public function behaviors()
    {
        return [
            'galleryBehavior' => [
                'class' => GalleryBehavior::className(),
                'type' => 'product',
                'extension' => 'jpg',
                'directory' => Yii::getAlias('@common') . '/media/images/client',
                'url' => 'http://' . $_SERVER['HTTP_HOST'] . '/images/client',
                'versions' => [
                    'small' => function ($img) {
                        /** @var \Imagine\Image\ImageInterface $img */
                        return $img
                            ->copy()
                            ->thumbnail(new \Imagine\Image\Box(200, 200));
                    },
                    'medium' => function ($img) {
                        /** @var \Imagine\Image\ImageInterface $img */
                        $dstSize = $img->getSize();
                        $maxWidth = 1800;
                        if ($dstSize->getWidth() > $maxWidth) {
                            $dstSize = $dstSize->widen($maxWidth);
                        }
                        return $img
                            ->copy()
                            ->resize($dstSize);
                    },
                ]
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'client';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['gender', 'type', 'approve', 'status', 'city', 'user_id'], 'integer'],
            [['date_create', 'date_update', 'phones', 'tags'], 'safe'],
            [['seo_title', 'seo_keywords', 'seo_description'], 'string'],
            [['first_name', 'last_name', 'middle_name', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'Имя',
            'last_name' => 'Фамилия',
            'middle_name' => 'Отчество',
            'gender' => 'Пол',
            'description' => 'Описание',
            'type' => 'Тип клиента',
            'date_create' => 'Дата создания',
            'date_update' => 'Дата обновления',
            'approve' => 'Одобрение',
            'seo_title' => 'Мета-тайтл',
            'seo_keywords' => 'Ключевые слова',
            'seo_description' => 'Мета-описание',
            'address' => 'Адрес',
            'city' => 'Город',
            'status' => 'Статус',
        ];
    }

    public function getActivitiesRelations()
    {
        return $this->hasMany(Activities::className(), ['client_id' => 'id']);
    }

    public function getTagRelations()
    {
        return $this->hasMany(Tag::className(), ['id' => 'tag_id'])
            ->via('activitiesRelations');
    }

    public function getPhonesRelations()
    {
        return $this->hasMany(Phones::className(), ['client_id' => 'id']);
    }


    public function beforeSave($insert)
    {
        if ($this->isNewRecord) {
            $this->status = self::STATUS_ACTIVE;
            $this->date_create = Yii::$app->formatter->asDate('now', 'php:Y-m-d h:i:s');
        }

        if (!$this->isNewRecord) {
            $this->date_update = Yii::$app->formatter->asDate('now', 'php:Y-m-d h:i:s');
        }

        return parent::beforeSave($insert);
    }

    public function afterSave($insert, $changedAttributes)
    {
        $phones = [];

        if (!empty($this->date_update)) {

            if ($this->phonesRelations) {
                foreach ($this->phonesRelations as $phone) {
                    $phones[] = $phone->number;
                }
            }

            if (array_key_exists('input_phone', $this->phones)) {
                if ($this->phones['input_phone'][0] === '') {
                    if ($this->phonesRelations) {
                        Phones::deleteAll(['client_id' => $this->id]);
                    }
                } else {
                    foreach ($this->phones['input_phone'] as $phone) {
                        if (!in_array($phone, $phones) || empty($phones)) {
                            $phoneObject = new Phones();
                            $phoneObject->number = $phone;
                            $phoneObject->client_id = $this->id;
                            $phoneObject->save(false);
                        }

                        if (in_array($phone, $phones)) {
                            $item = array_search($phone, $phones);
                            unset($phones[$item]);
                        }
                    }

                    Phones::deleteAll(['number' => array_values($phones)]);
                }
            }

            $tags = ArrayHelper::map($this->tagRelations, 'id', 'id');


            if ($this->tags === '') {

                Activities::deleteAll(['client_id' => $this->id, 'tag_id' => $tags]);
            } else {

                foreach ($this->tags as $tag) {
                    if (!in_array($tag, $tags)) {
                        var_dump($tag, '321321');
                        die;
                        $activities = new Activities();
                        $activities->client_id = $this->id;
                        $activities->tag_id = $tag;
                        $activities->save(false);
                    }

                    if (isset($tags[$tag])) {
                        unset($tags[$tag]);
                    }

                    Activities::deleteAll(['tag_id' => $tags]);
                }
            }

            parent::afterSave($insert, $changedAttributes);
        }
    }

    public function afterFind()
    {
        $phones = [];

       /// var_dump($this->tags);
        //die;
        $this->tags = $this->tagRelations;

        if ($this->tags) {
            foreach ($this->tags as $tag) {
                $tags[] = $tag->name;
            }
            $this->seo_keywords = implode(', ', $tags);
        }

        if($this->phonesRelations) {
            foreach($this->phonesRelations as $phone) {
                $phones[] = $phone->number;
            }
            $this->phones = $phones;
        }

        parent::afterFind();
    }
}
