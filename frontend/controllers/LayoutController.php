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

    public function actionMain()
    {
        return $this->render('main');
    }

    public function actionObjects()
    {
        return $this->render('objects');
    }

    public function actionMap()
    {
        return $this->render('map');
    }

    public function actionWishlist()
    {
        return $this->render('wishlist');
    }

    public function actionOpen()
    {
        return $this->render('open');
    }

    public function actionLogin()
    {
        return $this->render('login');
    }

    public function actionRegist()
    {
        return $this->render('regist');
    }



}