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
use yii\httpclient\Client;
use Yii;

class CallmeController extends ActiveController
{
    public $modelClass = 'app\models\Callme';
    // доступ ajax с других доменов
    public function behaviors()
    {

        $behaviors = parent::behaviors();
        $behaviors['corsFilter'] = [
            'class'=> Cors::className(),
//            'Access-Control-Request-Method' => ['POST', 'PUT', 'PATCH','GET','OPTIONS','HEAD'],
        ];
        $behaviors['contentNegotiator']=[
            'class'=> ContentNegotiator::className(),
            'formats'=>[
                'application/json'=> Response::FORMAT_JSON,
            ],
        ];

        return $behaviors;
    }

    /**
     * @return array
     */
    public function actions()
    {
        $actions = parent::actions();
        return $actions;
    }

    public function createAction($id)
    {

        $client = new Client();
        $phone = Yii::$app->request->post('phone');
//        ->setData(['api_id' => '4940EAEB-EAD2-89D5-E5CE-F61C7FC262EE', 'to' => '79853461615,79164497826','text'=> 'ДинаКлининг перезвони мне на тел:'. $phone])

        if ($phone!= null) {
            $response = $client->createRequest()
                ->setMethod('post')
                ->setUrl('https://sms.ru/sms/send')
                ->setData([
                    'api_id' => '4940EAEB-EAD2-89D5-E5CE-F61C7FC262EE',
                    'to' => '79853461615, 79164497826',
//                    'to' => '79853461615',
                    'text'=> 'ДинаКлининг - перезвони мне, тел:'. $phone
                ])
                ->send();
            if ($response->isOk) {
                Yii::$app->session->setFlash('success','отправлено');
            } else {
                Yii::$app->session->setFlash('error','что-то пошло не так');
            }
        }


        return parent::createAction($id);
    }





}