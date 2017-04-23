<?php


namespace app\controllers;


use app\models\Tasks;
use yii\data\ActiveDataProvider;
use yii\filters\ContentNegotiator;
use yii\filters\Cors;
use yii\filters\RateLimiter;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\rest\ActiveController;
use yii\web\Response;

class TasksController extends ActiveController
{
    public $modelClass = 'app\models\Tasks';
    // доступ ajax с других доменов
    public function behaviors()
    {
        return ArrayHelper::merge(parent::behaviors(),[
            'corsFilter'=>[
                'class'=>Cors::className(),
            ],
        ]);
    }

//    public function behaviors()
//    {
//        return [
//            'contentNegotiator' => [
//                'class' => ContentNegotiator::className(),
//                'formats' => [
//                    'application/json' => Response::FORMAT_JSON,
//                    'application/xml' => Response::FORMAT_XML,
//                ],
//            ],
////            'rateLimiter' => [
////                'class' => RateLimiter::className(),
////            ],
//        ];
//    }
    public function actions()
    {
        $actions = parent::actions();

        // disable the "delete" and "create" actions
        unset($actions['delete'], $actions['create']);

        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];

//        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return $actions;
    }

    public function prepareDataProvider()
    {

        $dataProvider = new ActiveDataProvider([
            'query' => Tasks::find(),
            'pagination'=> [
                'pageSize' => 1000,
            ],
            'sort' =>[
                'defaultOrder'=> [
                    'id' => SORT_ASC
                ]
            ]
        ]);
        return $dataProvider;
//        return Json::encode($dataProvider);
    }

}