<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "typework_and_client".
 *
 * @property int $id
 * @property int|null $clientId
 * @property int|null $typeworkId
 *
 * @property Clients $client
 * @property Typework $typework
 */
class TypeworkAndClient extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'typework_and_client';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['clientId', 'typeworkId'], 'integer'],
            [['clientId'], 'exist', 'skipOnError' => true, 'targetClass' => Clients::className(), 'targetAttribute' => ['clientId' => 'id']],
            [['typeworkId'], 'exist', 'skipOnError' => true, 'targetClass' => Typework::className(), 'targetAttribute' => ['typeworkId' => 'id']],
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
            'typeworkId' => 'Typework ID',
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
     * Gets query for [[Typework]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTypework()
    {
        return $this->hasOne(Typework::className(), ['id' => 'typeworkId']);
    }
}
