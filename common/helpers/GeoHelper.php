<?php

namespace common\helpers;

class GeoHelper
{
    public static $ipAddress;

    public function __construct()
    {
        self::$ipAddress = $_SERVER['REMOTE_ADDR'];

    }

    public static function getCityName()
    {
        $query = @unserialize(file_get_contents('http://ip-api.com/php/' . self::$ipAddress . '?lang=ru'));

        if ($query && $query['status'] === 'success') {
            return $query['city'];
        }

        return false;
    }

}
