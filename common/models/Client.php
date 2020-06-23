<?php

namespace common\models;

use common\modules\subject\models\Subject;
use common\models\TypeWork;
use zxbodya\yii2\galleryManager\GalleryBehavior;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "client".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $gender
 * @property string|null $mail
 * @property string|null $desc
 * @property int|null $type
 * @property string|null $dateCreate
 * @property string|null $dateUpdate
 * @property int|null $approve
 * @property string|null $title
 * @property string|null $keywords
 * @property string|null $descriptionSeo
 * @property int $status
 *
 * @property Subject[] $clientAndSubjects
 * @property TypeWork[] $clientAndTypeWork
 * @property ViewCategory[] $clientAndViewCategory
 * @property ClientPhones[] $clientPhones
 */
class Client extends \yii\db\ActiveRecord
{

    public $subjects = [];
    public $phones = [];
    public $typeWork = [];
    public $arrayTypeWork = [];
    public $viewCategory = [];
    public $arrayViewCategory = [];

    public function behaviors()
    {
        $model = $this;
        return [
            'galleryBehavior' => [
                'class' => GalleryBehavior::className(),
                'type' => 'product',
                'extension' => 'jpg',
                'directory' => Yii::getAlias('@backend') . '/web/images/product',
                'url' => 'http://' . $_SERVER['HTTP_HOST'] . '/images/product',
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
            [['gender', 'type', 'approve', 'status'], 'integer'],
            [['dateCreate', 'dateUpdate'], 'safe'],
            [['title', 'keywords', 'descriptionSeo'], 'string'],
            [['status'], 'required'],
            [['subjects', 'arrayTypeWork', 'arrayViewCategory', 'phones', 'desc'], 'safe'],
            [['name', 'mail'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'gender' => 'Gender',
            'mail' => 'Mail',
            'desc' => 'Desc',
            'type' => 'Type',
            'dateCreate' => 'Date Create',
            'dateUpdate' => 'Date Update',
            'viewCategory' => 'View Category',
            'typeWork' => 'Type Work',
            'approve' => 'Approve',
            'title' => 'Title',
            'keywords' => 'Keywords',
            'descriptionSeo' => 'Description Seo',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[ClientAndSubjects]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClientAndSubjects()
    {
        return $this->hasMany(ClientAndSubject::className(), ['clientId' => 'id']);
    }

    public function getSubject()
    {
        return $this->hasMany(Subject::className(), ['id' => 'subjectId'])
            ->via('clientAndSubjects');
    }

    /**
     * Gets query for [[ClientAndTypeWork]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClientAndTypeWork()
    {
        return $this->hasMany(TypeworkAndClient::className(), ['clientId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTypeWork()
    {
        return $this->hasMany(TypeWork::className(), ['id' => 'typeworkId'])
            ->via('clientAndTypeWork');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClientAndViewCategory()
    {
        return $this->hasMany(ViewCategoryAndClient::className(), ['clientId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getViewCategory()
    {
        return $this->hasMany(ViewCategory::className(), ['id' => 'viewCategoryId'])
            ->via('clientAndViewCategory');
    }

    /**
     * @param bool $insert
     * @return bool
     * @throws \yii\base\InvalidConfigException
     */
    public function beforeSave($insert)
    {
        if ($this->isNewRecord) {
            $this->dateCreate = Yii::$app->formatter->asDate('now', 'php:Y-m-d h:i:s');
        }

        if (!$this->isNewRecord) {
            $this->dateUpdate = Yii::$app->formatter->asDate('now', 'php:Y-m-d h:i:s');
        }

        return parent::beforeSave($insert);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClientPhones() {
        return $this->hasMany(ClientPhones::className(), ['clientId' => 'id']);
    }

    public function afterSave($insert, $changedAttributes)
    {
        $arrayPhones = [];
        if($this->clientPhones){
            foreach($this->clientPhones as $phones) {
                $arrayPhones[] = $phones->number;
            }
        }

        if ($this->phones['Phones'][0] == ''){
            if ($this->clientPhones) {
                ClientPhones::deleteAll(['clientId' => $this->id]);
            }
        } else {
            foreach($this->phones['Phones'] as $phone) {
                if (!in_array($phone, $arrayPhones) || empty($arrayPhones)) {
                    $clientPhone = new ClientPhones();
                    $clientPhone->number = $phone;
                    $clientPhone->clientId = $this->id;
                    $clientPhone->save(false);
                }

                if (in_array($phone, $arrayPhones)) {
                    $object = array_search($phone, $arrayPhones);
                    unset($arrayPhones[$object]);
                }
            }
            ClientPhones::deleteAll(['number' => array_values($arrayPhones)]);
        }

        $arr = ArrayHelper::map($this->subject, 'id', 'id');

        if($this->subjects == '') {
            ClientAndSubject::deleteAll(['clientId' => $this->id, 'subjectId' => $arr]);
        } else {
            foreach ($this->subjects as $sub) {
                if (!in_array($sub, $arr)) {
                    $clientAndSubject = new ClientAndSubject();
                    $clientAndSubject->clientId = $this->id;
                    $clientAndSubject->subjectId = $sub;
                    $clientAndSubject->save(false);
                }

                if (isset($arr[$sub])) {
                    unset($arr[$sub]);
                }

                ClientAndSubject::deleteAll(['subjectId' => $arr]);
            }
        }

        $arrVt = ArrayHelper::map($this->typeWork, 'id', 'id');

        if($this->arrayTypeWork == '') {
            TypeworkAndClient::deleteAll(['clientId' => $this->id, 'typeworkId' => $arrVt]);
        } else {
            foreach ($this->arrayTypeWork as $tw) {
                if (!in_array($tw, $arrVt)) {
                    $clientAndTypework = new TypeworkAndClient();
                    $clientAndTypework->clientId = $this->id;
                    $clientAndTypework->typeworkId = $tw;
                    $clientAndTypework->save(false);
                }

                if (isset($arrVt[$tw])) {
                    unset($arrVt[$tw]);
                }

                TypeworkAndClient::deleteAll(['typeworkId' => $arrVt]);
            }
        }

        $arrViewCategory = ArrayHelper::map($this->viewCategory, 'id', 'id');

        if($this->arrayViewCategory == '') {
            ViewCategoryAndClient::deleteAll(['clientId' => $this->id, 'viewCategoryId' => $arrViewCategory]);
        } else {
            foreach ($this->arrayViewCategory as $vc) {
                if (!in_array($vc, $arrViewCategory)) {
                    $clientAndViewCategory = new ViewCategoryAndClient();
                    $clientAndViewCategory->clientId = $this->id;
                    $clientAndViewCategory->viewCategoryId = $vc;
                    $clientAndViewCategory->save(false);
                }

                if (isset($arrViewCategory[$vc])) {
                    unset($arrViewCategory[$vc]);
                }

                ViewCategoryAndClient::deleteAll(['viewCategoryId' => $arrViewCategory]);
            }
        }

        parent::afterSave($insert, $changedAttributes);
    }

    public function afterFind()
    {
        $this->subjects = $this->subject;
        $this->arrayTypeWork = $this->typeWork;
        $this->arrayViewCategory = $this->viewCategory;

        if ($this->subjects ) {
            foreach ($this->subjects as $keyword) {
                $keywords[] = $keyword->name;
            }
            $this->keywords = implode(', ', $keywords);
        }

        if($this->clientPhones) {
            foreach($this->clientPhones as $phones) {
                $phoneArray[] = $phones->number;
            }
            $this->phones = $phoneArray;
        }

        parent::afterFind();
    }
}
