<?php


namespace common\components;

use common\models\Client;
use common\models\User;
use Yii;
use yii\base\BaseObject as Obj;
use yii\base\Exception;
use yii\web\UrlRuleInterface;

class RuleUrl implements UrlRuleInterface {

    public function createUrl($manager, $route, $params){

       if ($route == 'layout/main') {
           return '/';
       }
       return false;
    }
    public function parseRequest($manager, $request)
    {

        return false;
    }
}

