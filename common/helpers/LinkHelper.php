<?php


namespace common\helpers;


use common\models\Client;

class LinkHelper
{
    private static $titleObjects = [
        1 => '',
        2 => '',
        3 => '',
    ];

    public function __construct($clientId)
    {
        Client::$typeClients[$clientId];
    }

    public static function getLinkObject($objectId)
    {

    }

}
