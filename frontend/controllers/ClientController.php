<?php


namespace frontend\controllers;

use frontend\models\SignupForm;
use Yii;
use yii\web\Controller;

class ClientController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionRegist()
    {
        $model = new SignupForm();

        if ($model->load(Yii::$app->request->post())) {

            if ($client = $model->signup()) {
                return $this->goHome();
            }
        }

        return $this->render('regist', ['model' => $model]);
    }

}
