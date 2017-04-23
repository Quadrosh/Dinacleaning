<?php


namespace app\controllers;


use yii\filters\Cors;
use yii\helpers\ArrayHelper;
use yii\rest\ActiveController;

class HomeslidesController extends ActiveController
{
    public $modelClass = 'app\models\HomeSlides';
    // доступ ajax с других доменов
    public function behaviors()
    {
        return ArrayHelper::merge(parent::behaviors(),[
            'corsFilter'=>[
                'class'=>Cors::className(),
            ],
        ]);
    }
}