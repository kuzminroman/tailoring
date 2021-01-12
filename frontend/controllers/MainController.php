<?php

namespace frontend\controllers;

use common\models\Client;
use common\models\LoginForm;
use Yii;
use yii\web\Controller;

class MainController extends Controller
{
    public function actionIndex()
    {
        $model = Client::findAll(['status' => Client::STATUS_ACTIVE]);
        return $this->render('index', ['model' => $model]);
    }

    public function actionOpen()
    {

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('open', [
                'model' => $model,
            ]);
        }
    }

}
