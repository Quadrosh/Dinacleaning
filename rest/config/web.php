<?php

$params = require(__DIR__ . '/local_params.php');

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
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => $params['cookieValidationKey'],
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
        'db' => require(__DIR__ . '/local_db.php'),

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
                ['class' => 'yii\rest\UrlRule', 'controller' => 'prices'],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'calendar'],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'callme','pluralize'=>false],
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
