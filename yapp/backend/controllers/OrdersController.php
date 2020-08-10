<?php

namespace backend\controllers;

use common\models\Callme;
use Yii;
use common\models\Orders;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\httpclient\Client;

/**
 * OrdersController implements the CRUD actions for Orders model.
 */
class OrdersController extends BackController
{


    /**
     * Lists all Orders models.
     * @return mixed
     */
    public function actionIndex()
    {
        Url::remember();
        $dataProvider = new ActiveDataProvider([
            'query' => Orders::find(),
            'pagination'=> [
                'pageSize' => 100,
            ],
            'sort' =>[
                'defaultOrder'=> [
                    'id' => SORT_DESC
                ]
            ]
        ]);


        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionUtm()
    {
        $orders = Orders::find()->orderBy('id')->all();
        $callmes = Callme::find()->orderBy('id')->all();
        $leads = [];
        $leadId = 0;
        foreach ($orders as $order) {
            $leadId ++;

            $leads[$leadId]['type']= 'order';
            $leads[$leadId]['id']= $order['id'];

            $leads[$leadId]['work_date']= $order['work_date'];
            $leads[$leadId]['phone']= $order['phone'];
            $leads[$leadId]['work_type']= $order['work_type'];

            $leads[$leadId]['utm_source']= $order['utm_source'];
            $leads[$leadId]['utm_medium']= $order['utm_medium'];
            $leads[$leadId]['utm_campaign']= $order['utm_campaign'];
            $leads[$leadId]['utm_term']= $order['utm_term'];
            $leads[$leadId]['utm_content']= $order['utm_content'];
            $leads[$leadId]['created_at']= $order['created_at'];
        }
        foreach ($callmes as $callme) {
            $leadId ++;
            $leads[$leadId]['type']= 'quickForm';
            $leads[$leadId]['id']= $callme['id'];
            $leads[$leadId]['work_date']= '';
            $leads[$leadId]['phone']= $callme['phone'];
            $leads[$leadId]['work_type']= '';

            $leads[$leadId]['utm_source']= $callme['utm_source'];
            $leads[$leadId]['utm_medium']= $callme['utm_medium'];
            $leads[$leadId]['utm_campaign']= $callme['utm_campaign'];
            $leads[$leadId]['utm_term']= $callme['utm_term'];
            $leads[$leadId]['utm_content']= $callme['utm_content'];
            $leads[$leadId]['created_at']= $callme['created_at'];
        }
        ArrayHelper::multisort($leads,['created_at'],[SORT_DESC]);
//        var_dump($leads); die;
        return $this->render('utm', [
            'leads' => $leads,
        ]);
    }



    public function actionSms()
    {
        $client = new Client();
        $response = $client->createRequest()
            ->setMethod('post')
            ->setUrl('https://sms.ru/sms/send')
            ->setData(['api_id' => '4940EAEB-EAD2-89D5-E5CE-F61C7FC262EE', 'to' => '79853461615', 'text' => 'seeeend'])
            ->send();
        if ($response->isOk) {
            Yii::$app->session->setFlash('success','отправлено');
        } else {
            Yii::$app->session->setFlash('error','что-то пошло не так');
        }
        return $this->redirect(Url::previous());

    }

    /**
     * Displays a single Orders model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Orders model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Orders();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Orders model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Orders model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Orders model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Orders the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Orders::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
