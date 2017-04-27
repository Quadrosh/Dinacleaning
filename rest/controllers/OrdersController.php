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
//        if (!empty(\Yii::$app->request->post('phone'))) {
//            $workType = \Yii::$app->request->post('work_type');
//            $area = \Yii::$app->request->post('area');
//            $phone = \Yii::$app->request->post('phone');
//            $name = \Yii::$app->request->post('name');
//            $work_date = \Yii::$app->request->post('work_date');
//            $workplace = \Yii::$app->request->post('workplace');
//            $address = \Yii::$app->request->post('address');
//            $comment = \Yii::$app->request->post('comment');
//
//            $ch = curl_init("https://sms.ru/sms/send");
//            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//            curl_setopt($ch, CURLOPT_TIMEOUT, 30);
//            curl_setopt($ch, CURLOPT_POSTFIELDS, array(
//                "api_id" =>	"4940EAEB-EAD2-89D5-E5CE-F61C7FC262EE",
//            "to"	 =>	"79853461615", //Ya
////            "to"	 =>	"79092487575", //Гуля
////            "to"	 =>	"79164497826", //Дина
////                "to"	 =>	"79606137985", //нефтянка
//                "text"	 =>	$work_date.' '.$name.' тип:'.$workType .' тел:'. $phone.' помещение:'.$workplace.' '.$area.'м2 место:'.$address.' '.$comment,
//
//            ));
//            $body = curl_exec($ch);
//            curl_close($ch);
//
//
//        }

//        без curl
//        if (!empty(\Yii::$app->request->post('phone'))) {
//            $workType = \Yii::$app->request->post('work_type');
//            $area = \Yii::$app->request->post('area');
//            $phone = \Yii::$app->request->post('phone');
//            $name = \Yii::$app->request->post('name');
//            $work_date = \Yii::$app->request->post('work_date');
//            $workplace = \Yii::$app->request->post('workplace');
//            $address = \Yii::$app->request->post('address');
//            $comment = \Yii::$app->request->post('comment');
//            $body=file_get_contents("https://sms.ru/sms/send?api_id=4940EAEB-EAD2-89D5-E5CE-F61C7FC262EE&to=79853461615&text=".urlencode($work_date.' '.$name.' тип:'.$workType .' тел:'. $phone.' помещение:'.$workplace.' '.$area.'м2 место:'.$address.' '.$comment));
//        }
//                Zelenin sms
//        if (!empty(\Yii::$app->request->post('phone'))) {
//            $workType = \Yii::$app->request->post('work_type');
//            $area = \Yii::$app->request->post('area');
//            $phone = \Yii::$app->request->post('phone');
//            $name = \Yii::$app->request->post('name');
//            $work_date = \Yii::$app->request->post('work_date');
//            $workplace = \Yii::$app->request->post('workplace');
//            $address = \Yii::$app->request->post('address');
//            $comment = \Yii::$app->request->post('comment');
//            \Yii::$app->sms->sms_send( '79853461615', $work_date.' '.$name.' тип:'.$workType .' тел:'. $phone.' помещение:'.$workplace.' '.$area.'м2 место:'.$address.' '.$comment );
//        }
        $client = new Client();
        if (!empty(\Yii::$app->request->post('phone'))) {
            $workType = \Yii::$app->request->post('work_type');
            $area = \Yii::$app->request->post('area');
            $phone = \Yii::$app->request->post('phone');
            $name = \Yii::$app->request->post('name');
            $work_date = \Yii::$app->request->post('work_date');
            $workplace = \Yii::$app->request->post('workplace');
            $address = \Yii::$app->request->post('address');
            $comment = \Yii::$app->request->post('comment');
            $response = $client->createRequest()
                ->setMethod('post')
                ->setUrl('https://sms.ru/sms/send')
                ->setData(['api_id' => '4940EAEB-EAD2-89D5-E5CE-F61C7FC262EE', 'to' => '79853461615','text'=>'chek'])
                ->send();
//            if ($response->isOk) {
//                $newUserId = $response->data['id'];
//            }
//            \Yii::$app->sms->sms_send( '79853461615', $work_date.' '.$name.' тип:'.$workType .' тел:'. $phone.' помещение:'.$workplace.' '.$area.'м2 место:'.$address.' '.$comment );
        }

        return parent::createAction($id);
    }







}