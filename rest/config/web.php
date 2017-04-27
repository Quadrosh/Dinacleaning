<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'ru-RU',
    'name' => 'Дина клининг',
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\Module',
            'layout' => 'admin',
//            'defaultRoute' => 'order/index',
        ],
    ],
    'components' => [
        'sms' => [
            'class' => 'Zelenin\yii\extensions\Sms',
            'api_id' => '4940EAEB-EAD2-89D5-E5CE-F61C7FC262EE',
            'login' => '9853461615',
            'password' => 'cxzaqwe'
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'mufCCHDCR-DZ6KYrEIktV9G8uOWbxkR0',
            // REST
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',  // enable Json for REST
            ],
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
//            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                ['class' => 'yii\rest\UrlRule', 'controller' => 'pages'],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'tasks'],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'homeslides'],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'advantages'],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'partners'],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'review'],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'orders'],
            ],
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
