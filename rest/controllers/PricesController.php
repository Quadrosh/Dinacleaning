<?php


namespace app\controllers;


use app\models\Prices;
use app\models\Tasks;
use yii\data\ActiveDataProvider;
use yii\filters\ContentNegotiator;
use yii\filters\Cors;
use yii\filters\RateLimiter;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\rest\ActiveController;
use yii\web\Response;

class PricesController extends ActiveController
{
    public $modelClass = 'app\models\Prices';
    // доступ ajax с других доменов
    public function behaviors()
    {
        return ArrayHelper::merge(parent::behaviors(),[
            'corsFilter'=>[
                'class'=>Cors::className(),
            ],
        ]);
    }

    public function actions()
    {
        $actions = parent::actions();

        // disable the "delete" and "create" actions
        unset($actions['delete'], $actions['create']);

        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];

        return $actions;
    }

    public function prepareDataProvider()
    {

        $dataProvider = new ActiveDataProvider([
            'query' => Prices::find(),
            'pagination'=> [
                'pageSize' => 1000,
            ],
            'sort' =>[
                'defaultOrder'=> [
                    'type_id' => SORT_ASC,
                    'list_order' => SORT_ASC,
                ]
            ]
        ]);
        return $dataProvider;
    }

}