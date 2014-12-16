<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'asd87fash89dg86c78dasdy8asd',
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => false,
            'enableSession' => false,
            'loginUrl'=>null,
            
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
       'urlManager' => [
            'enablePrettyUrl' => true,
            'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules' => [
                ['class' => 'yii\rest\UrlRule', 'controller' => ['testpooledsamplesd'],
                    'extraPatterns' => [
                        'GET last' => 'last',
                        'GET first' => 'first',
                        'GET mine' => 'mine',
                    ]
                ],
                ['class' => 'yii\rest\UrlRule', 'controller' => ['testpretestposttest'],
                    'extraPatterns' => [
                        'GET last' => 'last',
                        'GET first' => 'first',
                        'GET mine' => 'mine',
                    ]
                ],
                ['class' => 'yii\rest\UrlRule', 'controller' => ['testposttestbetweengroups'],
                    'extraPatterns' => [
                        'GET last' => 'last',
                        'GET first' => 'first',
                        'GET mine' => 'mine',
                    ]
                ],
                ['class' => 'yii\rest\UrlRule', 'controller' => ['testpretestposttestwcontrol'],
                    'extraPatterns' => [
                        'GET last' => 'last',
                        'GET first' => 'first',
                        'GET mine' => 'mine',
                    ]
                ],
                ['class' => 'yii\rest\UrlRule', 'controller' => ['testconvertdtor'],
                    'extraPatterns' => [
                        'GET last' => 'last',
                        'GET first' => 'first',
                        'GET mine' => 'mine',
                    ]
                ],
                ['class' => 'yii\rest\UrlRule', 'controller' => ['testconvertrtod'],
                    'extraPatterns' => [
                        'GET last' => 'last',
                        'GET first' => 'first',
                        'GET mine' => 'mine',
                    ]
                ],
                ['class' => 'yii\rest\UrlRule', 'controller' => ['testconvertttod'],
                    'extraPatterns' => [
                        'GET last' => 'last',
                        'GET first' => 'first',
                        'GET mine' => 'mine',
                    ]
                ],
                ['class' => 'yii\rest\UrlRule', 'controller' => ['testconvertttor'],
                    'extraPatterns' => [
                        'GET last' => 'last',
                        'GET first' => 'first',
                        'GET mine' => 'mine',
                    ]
                ],
                ['class' => 'yii\rest\UrlRule', 'controller' => ['testconvertdtologodd'],
                    'extraPatterns' => [
                        'GET last' => 'last',
                        'GET first' => 'first',
                        'GET mine' => 'mine',
                    ]
                ],
                ['class' => 'yii\rest\UrlRule', 'controller' => ['testconvertlogoddtod'],
                    'extraPatterns' => [
                        'GET last' => 'last',
                        'GET first' => 'first',
                        'GET mine' => 'mine',
                    ]
                ],
            ],
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
        'orion2Db' => require(__DIR__ . '/orion2Db.php'),
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
}

return $config;
