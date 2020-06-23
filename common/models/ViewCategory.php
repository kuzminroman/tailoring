<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "view_category".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $status
 *
 * @property ViewcategoryAndClient[] $viewcategoryAndClients
 */
class ViewCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'view_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['name'], 'string', 'max' => 100],
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
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[ViewcategoryAndClients]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getViewcategoryAndClients()
    {
        return $this->hasMany(ViewcategoryAndClient::className(), ['viewCategoryId' => 'id']);
    }
}
