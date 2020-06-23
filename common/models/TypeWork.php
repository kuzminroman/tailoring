<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "typework".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $status
 *
 * @property TypeworkAndClient[] $typeworkAndClients
 */
class TypeWork extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'typework';
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
     * Gets query for [[TypeworkAndClients]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTypeworkAndClients()
    {
        return $this->hasMany(TypeworkAndClient::className(), ['typeworkId' => 'id']);
    }
}
