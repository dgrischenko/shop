<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';
define("LINK", 'https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'ru-Ru',
    'defaultRoute' => 'category/index',
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\Module',
            'layout' => 'admin',
            'defaultRoute' => 'order/index',
        ],
        'yii2images' => [
            'class' => 'rico\yii2images\Module',
            //be sure, that permissions ok
            //if you cant avoid permission errors you have to create "images" folder in web root manually and set 777 permissions
            'imagesStorePath' => 'upload/store', //path to origin images
            'imagesCachePath' => 'upload/cache', //path to resized copies
            'graphicsLibrary' => 'GD', //but really its better to use 'Imagick'
            'placeHolderPath' => '@webroot/upload/store/no-image.png', // if you want to get placeholder when image not exists, string will be processed by Yii::getAlias
         //   'imageCompressionQuality' => 100, // Optional. Default value is 85.
        ],
0    ],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'dFVoK_bkcOGcMY7jfhLkrjoNnCYTkXbU',
            'baseUrl' => '',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
           // 'loginUrl' => 'cart/view',
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smpt.mail.ru',
                'username' => 'bigmandg',
                'password' => 'Bhf221183',
                'port' => '465',
                'encryption' => 'ssl',
                ],

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
        'db' => $db,

        'CbRF' => [
            'class' => 'microinginer\CbRFRates\CBRF',
            'defaultCurrency' => "EUR"
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [

                'category/<id:\d+>/page/<page:\d+>' => 'category/view',
                'categoru/<id:\d+>/page/<page:\d+>' => 'category/viewu',
                'categore/<id:\d+>/page/<page:\d+>' => 'category/viewe',
                'categorr/<id:\d+>/page/<page:\d+>' => 'category/viewr',

                'category/view/<id:\d+>/page/<page:\d+>' => 'category/view',
                'categoru/view/<id:\d+>/page/<page:\d+>' => 'category/viewu',
                'categore/view/<id:\d+>/page/<page:\d+>' => 'category/viewe',
                'categorr/view/<id:\d+>/page/<page:\d+>' => 'category/viewr',

                'category/<id:\d+>' => 'category/view',
                'categoru/<id:\d+>' => 'category/viewu',
                'categore/<id:\d+>' => 'category/viewe',
                'categorr/<id:\d+>' => 'category/viewr',

                'product/<id:\d+>' => 'product/view',
                'productu/<id:\d+>' => 'product/viewu',
                'producte/<id:\d+>' => 'product/viewe',
                'productr/<id:\d+>' => 'product/viewr',

                'contacts' => 'site/contacts',
                'contact' => 'site/contact',
                'contactform' => 'site/contactform',
                'about' => 'site/about',

                'search' => 'category/search',

                'hitses' => 'product/hitses',
                'hitsesu' => 'product/hitses',
                'hitsese' => 'product/hitses',
                'hitsesr' => 'product/hitses',

                'newses' => 'product/newses',
                'newsesu' => 'product/newses',
                'newsese' => 'product/newses',
                'newsesr' => 'product/newses',

                'sales' => 'product/sales',
                'salesu' => 'product/salesu',
                'salese' => 'product/salese',
                'salesr' => 'product/salesr',

            ],
        ],

    ],

    'controllerMap' => [
        'elfinder' => [
            'class' => 'mihaildev\elfinder\PathController',
            'access' => ['@'],
            'root' => [
                'baseUrl' => '/web',
                'path' => 'upload/global',
                'name' => 'Global'
            ],
           /* 'watermark' => [
                'source'         => __DIR__.'/logo.png', // Path to Water mark image
                'marginRight'    => 5,          // Margin right pixel
                'marginBottom'   => 5,          // Margin bottom pixel
                'quality'        => 95,         // JPEG image save quality
                'transparency'   => 70,         // Water mark image transparency ( other than PNG )
                'targetType'     => IMG_GIF|IMG_JPG|IMG_PNG|IMG_WBMP, // Target image formats ( bit-field )
                'targetMinPixel' => 200         // Target image minimum pixel size
            ]*/
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
