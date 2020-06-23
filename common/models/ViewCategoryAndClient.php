<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "viewcategory_and_client".
 *
 * @property int $id
 * @property int|null $clientId
 * @property int|null $viewCategoryId
 *
 * @property Clients $client
 * @property ViewCategory $viewCategory
 */
class ViewCategoryAndClient extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'viewcategory_and_client';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['clientId', 'viewCategoryId'], 'integer'],
            [['clientId'], 'exist', 'skipOnError' => true, 'targetClass' => Clients::className(), 'targetAttribute' => ['clientId' => 'id']],
            [['viewCategoryId'], 'exist', 'skipOnError' => true, 'targetClass' => ViewCategory::className(), 'targetAttribute' => ['viewCategoryId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'clientId' => 'Client ID',
            'viewCategoryId' => 'View Category ID',
        ];
    }

    /**
     * Gets query for [[Client]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(Clients::className(), ['id' => 'clientId']);
    }

    /**
     * Gets query for [[ViewCategory]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getViewCategory()
    {
        return $this->hasOne(ViewCategory::className(), ['id' => 'viewCategoryId']);
    }
}
