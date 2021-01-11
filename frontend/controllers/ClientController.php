<?php


namespace frontend\controllers;

use common\models\Client;
use frontend\models\SignupForm;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use zxbodya\yii2\galleryManager\GalleryManagerAction;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class ClientController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['regist', 'index', 'edit'],
                'rules' => [
                    [
                        'actions' => ['regist', 'index', 'edit'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actions()
    {
        return [
            'galleryApi' => [
                'class' => GalleryManagerAction::className(),
                // mappings between type names and model classes (should be the same as in behaviour)
                'types' => [
                    'product' => Client::className()
                ]
            ],
        ];
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

    public function actionEdit()
    {
        $userId = Yii::$app->user->id;
        /*var_dump($userId);

        die;*/
        $model = $this->findModel($userId);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['client/edit']);
        }

        return $this->render('edit', [
            'model' => $model,
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Client::findOne(['user_id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
