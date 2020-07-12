<?php


namespace frontend\controllers;

use Yii;
use yii\web\Controller;

class LayoutController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionTest()
    {
        return $this->render('test');
    }

}