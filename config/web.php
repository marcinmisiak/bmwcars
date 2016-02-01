<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
	'language'=>'pl',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'rakp8h8NH9PcL1tA8I23PqV5AT40qYQLemfCR0yrCT7Uw4sjUQvuggiZ',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
    	'mailer' =>	require(__DIR__ . '/mailer.php'),
     
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
    	'dbsklep' => require(__DIR__ . '/dbsklep.php'),
    		'urlManager' => [
    				'enablePrettyUrl' => true,
    				'showScriptName' => false,
    				'enableStrictParsing' => false,
    				'suffix' => '.html',
    				'rules' => [
    						'<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
    				],
    				],
    		'formatter' => [
    				'class' => 'yii\i18n\formatter',
    				'thousandSeparator' => ' ',
    				'decimalSeparator' => ',',
    				'currencyCode' => 'PLN'
    		],
    ],
	
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
