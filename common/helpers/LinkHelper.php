<?php

namespace common\helpers;

use common\models\Client;
use Yii;

class LinkHelper
{
    private static $nameLinkClient = [
        1 => 'salon',
        2 => 'master',
        3 => 'user',
    ];

    /**
     * @param null $typeId
     * @return false|string
     */
    public static function getLinkObject($typeId = null)
    {
        if (empty($typeId)) {
            $clientInfo = Client::find()->select(['id', 'type'])->where(['user_id' => Yii::$app->user->id])->one();

            if (empty($clientInfo)) {
                return false;
            }

            return Yii::$app->urlManager->createUrl([self::$nameLinkClient[$clientInfo['type']] . '/' . $clientInfo['id']]);
        }

        return self::$nameLinkClient[$typeId];
    }
}
