<?php

namespace common\modules\tag\models;

use common\models\Activities;
use Yii;

/**
 * This is the model class for table "crud".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $seo_title
 * @property string|null $seo_keywords
 * @property string|null $seo_description
 * @property int $status
 *
 * @property $Activities[] $Activities
 */
class Tag extends \yii\db\ActiveRecord
{
    public $tags;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tag';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['seo_keywords', 'seo_description'], 'safe'],
            [['status'], 'required'],
            [['status'], 'integer'],
            [['name', 'seo_title'], 'string', 'max' => 255],
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
            'seo_title' => 'Title',
            'seo_keywords' => 'Keywords',
            'seo_description' => 'Description',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[Activities]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getActivities()
    {
        return $this->hasMany(Activities::className(), ['client_id' => 'id']);
    }
}
