<?php


namespace app\controllers;


use Faker\Provider\DateTime;
use yii\data\ActiveDataProvider;
use yii\filters\Cors;
use yii\helpers\ArrayHelper;
use yii\rest\ActiveController;
use yii\rest\Controller;

class CalendarController extends ActiveController
//class CalendarController extends Controller
{
    public $modelClass = 'app\models\Pages';

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

//        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return $actions;
    }

    public function prepareDataProvider()
    {
        setlocale(LC_ALL, 'ru_RU.UTF-8');
        $today = strftime('%A %e %B', time());
        $date1 = strftime('%A %e %B', strtotime('+1 day'));
        $date2 = strftime('%A %e %B', strtotime('+2 day'));
        $date3 = strftime('%A %e %B', strtotime('+3 day'));
        $date4 = strftime('%A %e %B', strtotime('+4 day'));
        $date5 = strftime('%A %e %B', strtotime('+5 day'));
        $date6 = strftime('%A %e %B', strtotime('+6 day'));


        $dataProvider = [
                '0'=>$today,
                '1'=>$date1,
                '2'=>$date2,
                '3'=>$date3,
                '4'=>$date4,
                '5'=>$date5,
                '6'=>$date6,
        ];
        return $dataProvider;
    }
}