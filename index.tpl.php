<?php

// change the following paths if necessary
$yii = '${yii.basepath}/framework/yii.php';
$config = dirname(__FILE__).'/protected/config/main.php';
$functions = dirname(__FILE__).'/protected/helpers/functions.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG', ${project.debug});
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL', 3);

require_once($yii);
Yii::createWebApplication($config)->run();
