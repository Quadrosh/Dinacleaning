<?php


namespace app\controllers;


use app\models\Partners;
use app\models\Tasks;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\filters\ContentNegotiator;
use yii\filters\Cors;
use yii\filters\RateLimiter;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\rest\ActiveController;
use yii\web\Response;

class OrdersController extends ActiveController
{
    public $modelClass = 'app\models\Orders';
    // доступ ajax с других доменов
    public function behaviors()
    {
//        return ArrayHelper::merge(parent::behaviors(),[
//            'corsFilter'=>[
//                'class'=>Cors::className(),
//            ],
//        ]);
        $behaviors = parent::behaviors();
        $behaviors['corsFilter'] = [
            'class'=> Cors::className(),
        ];
        $behaviors['contentNegotiator']=[
            'class'=> ContentNegotiator::className(),
            'formats'=>[
                'application/json'=> Response::FORMAT_JSON,
            ],
        ];
//        $behaviors['access'] = [
//            'class'=>AccessControl::className(),
//            'only'=> ['create'],
//            'rules'=>[
//                [
//                    'actions'=>['delete'],
//                    'allow'=>false,
//                ]
//            ],
//        ];
        return $behaviors;


    }




}