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

class OrdersController extends ActiveController
{
    public $modelClass = 'app\models\Orders';
    // доступ ajax с других доменов
    public function behaviors()
    {

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
        $workType = Yii::$app->request->post('work_type');
        $area = Yii::$app->request->post('area');
        $phone = Yii::$app->request->post('phone');
        $name = Yii::$app->request->post('name');
        $work_date = Yii::$app->request->post('work_date');
        $workplace = Yii::$app->request->post('workplace');
        $address = Yii::$app->request->post('address');
        $comment = Yii::$app->request->post('comment');
        
        if ($phone!= null) {
            $response = $client->createRequest()
                ->setMethod('post')
                ->setUrl('https://sms.ru/sms/send')
                ->setData(['api_id' => '4940EAEB-EAD2-89D5-E5CE-F61C7FC262EE', 'to' => '79853461615,79164497826','text'=> $work_date.' '.$name.' тип:'.$workType .' тел:'. $phone.' помещение:'.$workplace.' '.$area.'м2 место:'.$address.' '.$comment])
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