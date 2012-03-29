<?php

// change the following paths if necessary

switch( $_SERVER['SERVER_NAME'] ) 
{
	case 'footprints' :

		$yii=dirname(__FILE__).'/../../yii_framework/yii-1.1.10.r3566/framework/yii.php';
		$config=dirname(__FILE__).'/protected/config/main.php';
		
		// remove the following lines when in production mode
		defined('YII_DEBUG') or define('YII_DEBUG',true);
		defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);
		
		break;
		
	case 'footprints.doublehops.com' :
		
		$yii= '/var/www/yii_framework/yii-1.1.10.r3566/framework/yii.php';
		$config=dirname(__FILE__).'/protected/config/main.php';
		
		// remove the following lines when in production mode
		defined('YII_DEBUG') or define('YII_DEBUG',false);
		defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);
		
		
		break;
}

require_once($yii);
Yii::createWebApplication($config)->run();
