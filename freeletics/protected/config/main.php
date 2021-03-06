<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'My Web Application',
    // preloading 'log' component
    'preload' => array('log'),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'application.services.*',
        'application.components.facebook.*',
    ),
    'modules' => array(
        // uncomment the following to enable the Gii tool
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => '123456',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '::1', 'site90.com', '31.170.165.50', $_SERVER['REMOTE_ADDR']),
        ),
    ),
    // application components
    'components' => array(
        'user' => array(
            'loginUrl' => array('default/index'),
            // enable cookie-based authentication
            'allowAutoLogin' => true,
            'autoUpdateFlash' => false
        ),
        // uncomment the following to enable URLs in path-format
        'urlManager' => array(
            'urlFormat' => 'path',
            'rules' => array(
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\w+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ),
//        'db' => array(
//            'connectionString' => 'sqlite:' . dirname(__FILE__) . '/../data/testdrive.db',
//        ),
        // uncomment the following to use a MySQL database
        'db' => array(
//            'connectionString' => 'mysql:host=localhost;dbname=freeletics',
            'connectionString' => 'mysql:host=localhost;dbname=yii',
//            'connectionString' => 'mysql:host=sql210.byethost15.com;dbname=b15_15548491_dev_site',
            'emulatePrepare' => true,
//            'username' => 'b15_15548491',
//            'username' => 'freeletics',
            'username' => 'root',
//            'password' => '1184759',
            'password' => 'root',
            'charset' => 'utf8',
        ),
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'info, error, warning',
                ),
            // uncomment the following to show log messages on web pages
            /*
              array(
              'class'=>'CWebLogRoute',
              ),
             */
            ),
        ),
        'clientScript' => array(
        ),
        "messages" => array(
            "class" => "CGettextMessageSource",
            "useMoFile" => FALSE,
        ),
        'Paypal' => array(
            'class' => 'application.components.Paypal',
            'apiUsername' => 'exp.hl.pc-facilitator_api1.gmail.com',
            'apiPassword' => '3L6QDBMT49UYNT3W',
            'apiSignature' => 'A9aYuU1hn9usruegVTtU7cF1jCmXA7opT1vp1Ctz4ot9eOWScd9tYDpG',
            'apiLive' => false,
            'email' => "exphlpc buyer !!!",
            'returnUrl' => 'payment/confirm/', //regardless of url management component
            'cancelUrl' => 'payment/cancel/', //regardless of url management component
        ),
        'Smtpmail' => array(
            'class' => 'application.extensions.smtpmail.PHPMailer',
            'Host' => "mail.freeletice.com",
            'Username' => 'webadmin@freeletice.com',
            'Password' => 'freeletics',
            'Mailer' => 'smtp',
            'Port' => 25,
            'SMTPAuth' => true,
        ),
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        // this is used in contact page
        'adminEmail' => 'webadmin@freeletice.com',
        'stringcode' => '$2a$0778$1xx0sX0HxhjjjmMMjJ8ahKMh9MbMjbh2O81mx7L7$',
        'durationLogin' => 3600 * 24 * 7,
        'code_coupon_length' => 20,
        "max_file_size" => 5 * 1024 * 1024,
        'app_id_facebook' => '322142577992142',
        'currency' => 'EUR',
        'transactionTimeout' => 60 * 5, // 5 minutes
        'NL_Email_Receiver' => 'exp.hl.pc@gmail.com',
        'CompanyName' => 'Freeletice',
        'domain' => $_SERVER['HTTP_HOST'],
    ),
);
