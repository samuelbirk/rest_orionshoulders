<?php
header('Access-Control-Allow-Origin: http://local.orionshoulders2.com');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
        //header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require(__DIR__ . '/../vendor/autoload.php');
require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');

$config = require(__DIR__ . '/../config/web.php');

(new yii\web\Application($config))->run();
