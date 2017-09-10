<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'language' => 'es', // Español
    'name' => 'Facturación',
    'timeZone' => 'America/Guayaquil',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'modules' => [
        'pdfjs' => [
            //'class' => '\yii2assets\pdfjs\Module',
            'class' => '\yii2assets\pdfjs\Module',
        /*     'waterMark'=>[
          'text'=>'DesignTechX S.A',
          'color'=> 'blue',
          'alpha'=>'0.3'
          ] */
        ],
        'datecontrol' => [
            'class' => 'kartik\datecontrol\Module',
            'autoWidget' => true,
            'autoWidgetSettings' => [
                'date' => [
                    'pluginOptions' => [
                        'autoclose' => true,
                        'todayHighlight' => true,
                    // 'todayBtn' => true,
                    ],
                ],
            ],
        ],
        'usuario' => [

            'class' => 'app\modules\usuario\Usuario',
        ],
        'gestion' => [
            'class' => 'app\modules\gestion\Gestion',
        ],
        'gridview' => [
            'class' => '\kartik\grid\Module',
            // enter optional module parameters below - only if you need to  
            // use your own export download action or custom translation 
            // message source
            'downloadAction' => 'gridview/export/download',
            'i18n' => [
                'class' => 'yii\i18n\PhpMessageSource',
                'basePath' => '@kvgrid/messages',
                'forceTranslation' => true
            ],
        ],
        //MODULO DE GESTION DE USUARIOS
        'admin' => [
            'class' => 'mdm\admin\Module',
            //  'layout' => 'left-menu', // it can be '@path/to/your/layout'.
            'layout' => 'top-menu', // it can be '@path/to/your/layout'.
            'controllerMap' => [
                'assignment' => [
                    'class' => 'mdm\admin\controllers\AssignmentController',
                    'userClassName' => 'app\models\User',
                    'idField' => 'id'
                ],
            /* 'Route' => [
              'class' => 'mdm\admin\controllers\RouteController', // add another controller
              ], */
            ],
            'menus' => [
                'assignment' => [
                    'label' => 'Asignación de Roles' // change label
                ],
                /* 'user' => [
                  'label' => 'Usuario' // change label
                  ],
                 */
                //'route' => null, // disable menu route 
                'rule' => null, // disable menu route 
                'permission' => null,
                'route' => null, // disable menu route 
            ]
        ],
    ],
    'components' => [

        'Yii2Twilio' => [
            'class' => 'filipajdacic\yiitwilio\YiiTwilio',
            'account_sid' => 'ACe9d9c0788f164f503159b6be6b492199',
            'auth_key' => '08f91f2cc74cc2ce68ad96705233b7c3',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
//MODULO RBAC
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'defaultRoles' => ['guest'],
        ],
//MODULO PARA ENVIO DE EMAIL
        'mailer' =>
        [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'mail.designtechx.com',
                'username' => 'info@designtechx.com',
                'password' => 'info12342017',
                'port' => '587',
            //'encryption' => 'tls',
            // 'encryption' => 'ssl',
            ],
        ],
        
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'e19qsp-LLP6tNCBu4ZU6DiTwtA4l8_wF',
        ],
        'formatter' => [
            'dateFormat' => 'dd-MM-yyyy',
            //'locale' => 'es_ES', //your language locale
            // 'dateFormat' => 'long',
            'defaultTimeZone' => 'America/Guayaquil', // time zone
            //
          // 'thousandSeparator' => ',',
            //'decimalSeparator' => '.',
            'currencyCode' => 'USD',
        ],
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false,
            //'suffix' => '.aspx',
            'rules' => [


                /* '<controller:\w+>/<slug>' => '<controller>/detalle', */
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                '<module>/<controller>/<action>/<id:\d+>' => '<module>/<controller>/<action>',
            ]
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
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
        'view' => [//
            'theme' => [
                'pathMap' => [
                    //  '@app/views' => '@vendor/dmstr/yii2-adminlte-asset/example-views/yiisoft/yii2-app'
                    '@app/views' => '@app/views/',
                ],
            ],
            
        
            'class' => '\rmrevin\yii\minify\View',
            'enableMinify' => !YII_DEBUG,
            'concatCss' => true, // concatenate css
            'minifyCss' => true, // minificate css
            'concatJs' => true, // concatenate js
            'minifyJs' => true, // minificate js
            'minifyOutput' => true, // minificate result html page
            'webPath' => '@web', // path alias to web base
            'basePath' => '@webroot', // path alias to web base
            'minifyPath' => '@webroot/assets/minify', // path alias to save minify result
            'jsPosition' => [ \yii\web\View::POS_END], // positions of js files to be minified
            'forceCharset' => 'UTF-8', // charset forcibly assign, otherwise will use all of the files found charset
            'expandImports' => true, // whether to change @import on content
            'compressOptions' => ['extra' => true], // options for compress
            'excludeFiles' => [
                'jquery.js', // exclude this file from minification
                'app-[^.].js', // you may use regexp
            ],
            'excludeBundles' => [
            //\dev\helloworld\AssetBundle::class, // exclude this bundle from minification
            ],
        
        ], //
        'assetManager' => [//
            'bundles' => [
                'dmstr\web\AdminLteAsset' => [
                   //'skin' => 'skin-blue',
                     //  'skin' => 'skin-red',
                   'skin' => 'skin-green',
                    //'skin' => 'skin-purple',
               // 'skin' => 'skin-black',
                ],
            ],
        ], //
    /*
      'urlManager' => [
      'enablePrettyUrl' => true,
      'showScriptName' => false,
      'rules' => [
      ],
      ],
     */
    ],
    'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            'admin/*',
            'site/login',
            'site/correo',
            'site/logout',
            'site/error',
            'site/resetearclave',
            'site/recuperarclave',
            'site/registro',
            'site/registro-cliente',
            'site/auth',
            'site/authNegocio',
            'site/authCliente',
            'site/captcha',
            'site/lista-subcategoria',
            'site/lista-ciudad',
            'site/enviar-correo-bienvenida-negocio',
            'site/activar-cuenta',
            'site/bienvenida',
            'site/reenviar',
            'site/*',
            'noticia/*'
        ]
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
