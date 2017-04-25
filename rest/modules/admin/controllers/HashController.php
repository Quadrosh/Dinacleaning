<?php

namespace app\modules\admin\controllers;

use yii\helpers\Url;

class HashController extends \yii\web\Controller
{
    public function actionIndex()
    {
        Url::remember();
        $password = \Yii::$app->request->post('password');
        $hashed = \Yii::$app->request->post('hashed');

        if (!empty($password)) {
            $hash = \Yii::$app->getSecurity()->generatePasswordHash($password);
            if (!empty($hashed)) {
              $valid =  \Yii::$app->getSecurity()->validatePassword($password, $hashed);
                if ($valid == true) {
                    $unhash = $password;
                } else {
                    $unhash ='не правильно';
                }
            }
        } else {
            $hash = '';
            $unhash ='';
        }







        return $this->render('index', [
            'hash' => $hash,
            'unhash' => $unhash,
        ]);
    }

}
