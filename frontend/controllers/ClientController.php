<?php


namespace frontend\controllers;

use common\helpers\LinkHelper;
use common\models\Client;
use frontend\models\SignupForm;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use zxbodya\yii2\galleryManager\GalleryManagerAction;

class ClientController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['edit'],
                'rules' => [
                    [
                        'actions' => ['edit'],
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
/*
    public function actionIndex()
    {
        return $this->render('index');
    }*/

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

    protected function findModel($id, $type = 'user_id')
    {
        $query = [
            $type => $id,
        ];

        if (($model = Client::findOne($query)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionObject($id)
    {
        $model = $this->findModel($id, 'id');
        $typeId = $model->type;

        if (strpos(Yii::$app->request->getUrl(), LinkHelper::getLinkObject($typeId)) === false) {
            return $this->render('/site/error', ['name' => '404 Error', 'message' => 'This is page not found']);
        }

        //со стороны пользователя тоже нужно сделать активность... либо зациклиться на имеющихся статусах
        if ($model->status !== Client::STATUS_ACTIVE && Yii::$app->user !== $model->user_id) {
            return $this->render('/site/error', ['name' => '404 Error', 'message' => 'This is page not found']);
        }

        return $this->render('object', ['model' => $model]);
    }

}
