<?php

namespace common\models;

use common\modules\subject\models\Subject;
use Yii;

/**
 * This is the model class for table "client_and_subject".
 *
 * @property int $id
 * @property int|null $clientId
 * @property int|null $subjectId
 *
 * @property Subjects $client
 * @property Clients $subject
 */
class ClientAndSubject extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'client_and_subject';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['clientId', 'subjectId'], 'integer'],
            [['clientId'], 'exist', 'skipOnError' => true, 'targetClass' => Subject::className(), 'targetAttribute' => ['clientId' => 'id']],
            [['subjectId'], 'exist', 'skipOnError' => true, 'targetClass' => Client::className(), 'targetAttribute' => ['subjectId' => 'id']],
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
            'subjectId' => 'Subject ID',
        ];
    }

    /**
     * Gets query for [[Client]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(Subject::className(), ['id' => 'clientId']);
    }

    /**
     * Gets query for [[Subject]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubject()
    {
        return $this->hasOne(Client::className(), ['id' => 'subjectId']);
    }
}
