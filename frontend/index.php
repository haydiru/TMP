<?php
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require(__DIR__ . '/../../titipmenitip/vendor/autoload.php');
require(__DIR__ . '/../../titipmenitip/vendor/yiisoft/yii2/Yii.php');
require(__DIR__ . '/../../titipmenitip/common/config/bootstrap.php');
require(__DIR__ . '/../../titipmenitip/frontend/config/bootstrap.php');

$config = yii\helpers\ArrayHelper::merge(
    require(__DIR__ . '/../../titipmenitip/common/config/main.php'),
    require(__DIR__ . '/../../titipmenitip/common/config/main-local.php'),
    require(__DIR__ . '/../../titipmenitip/frontend/config/main.php'),
    require(__DIR__ . '/../../titipmenitip/frontend/config/main-local.php')
);

$application = new yii\web\Application($config);
$application->run();
