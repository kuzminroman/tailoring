<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "geography".
 *
 * @property int $id
 * @property string|null $country
 * @property int|null $city
 * @property string|null $street
 * @property string|null $house
 * @property string|null $geoIp
 *
 * @property Clients[] $client
 * @property City $city0
 */
class Geography extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'geography';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['city'], 'integer'],
            [['country', 'street', 'house', 'geoIp'], 'string', 'max' => 255],
            [['city'], 'exist', 'skipOnError' => true, 'targetClass' => City::className(), 'targetAttribute' => ['city' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'country' => 'Country',
            'city' => 'City',
            'street' => 'Street',
            'house' => 'House',
            'geoIp' => 'Geo Ip',
        ];
    }

    /**
     * Gets query for [[Clients]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClients()
    {
        return $this->hasMany(Clients::className(), ['geography' => 'id']);
    }

    /**
     * Gets query for [[City0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCity0()
    {
        return $this->hasOne(City::className(), ['id' => 'city']);
    }
}
