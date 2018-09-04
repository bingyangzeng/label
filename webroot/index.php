<?php
	$root = dirname(__DIR__);
	date_default_timezone_set('PRC');
	define("APP_DEBUG", false);
	error_reporting(E_ALL);//使用error_reporting来定义哪些级别错误可以触发
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
	header('content-type:text/html;charset=utf-8');
	define('APP_PATH', $root);  //当前app的根目录
	define('ROOT_PATH', $root); //系统根目录
	ini_set('yaf.library', ROOT_PATH . '/phplib');
	ini_set('default_socket_timeout', -1);
	
	define('SMARTY_SPL_AUTOLOAD', 1);
	$uri = $_SERVER['REQUEST_URI'];
	$ary = explode('/', $uri);
	if (count($ary) > 1 && strlen($ary[1]) > 0) {
    		//这里也可以直接include模块的index.php入口文件
    		$module = $ary[1];
	} else {
    		$module = 'index';
	}
	$modules = array('error', 'tms', 'index');
	if (!in_array($module, $modules)) {
    		$module = 'index';
	}

	define('MODULE', $module);
	//phpinfo();exit;
	\Yaf\Registry::set('module', $module);
	$config = APP_PATH . '/conf/app.ini';
	$app = new \Yaf\Application($config);
	\Yaf\Registry::set('config', \Yaf\Application::app()->getConfig());
	try{
		$app->bootstrap();
		$app->run();
	}catch(Exception $e) {
		$message = $e->getMessage();
		var_dump($message);	
		if (defined("APP_DEBUG") && APP_DEBUG) {
        		//Ap_Debug::init();
        		//dd($message,"系统错误", 0);
        		//dd($ex->getTraceAsString(),0, 0);
    		}else {
        		header("HTTP/1.1 404 Not Found");
        		header("Status: 404 Not Found");
        		exit;
    		}
	}
