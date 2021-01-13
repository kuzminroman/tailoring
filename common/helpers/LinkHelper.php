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

    public static function getLinkObject($typeId = null, $id = false)
    {
        if (empty($typeId)) {
            $type = Client::find()->select(['id', 'type'])->where(['user_id' => Yii::$app->user->id])->one();
            var_dump($type);
            die;
            if (empty($type)) {
                return false;
            }

            return self::$nameLinkClient[$type] . ($id ? '/' . '' : '' );
        }

        return self::$nameLinkClient[$typeId];
    }

}
