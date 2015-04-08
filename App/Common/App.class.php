<?php
namespace Common;
class App{
	static function run($ConActConfigName){

		$controller = ucfirst(\Common\Http\Http::getGET('c','index'));
		$action  = \Common\Http\Http::getGET('a','index');

		$allowCA = \Common\Config\ConfigHelper::getConfigs($ConActConfigName);

		if(!array_key_exists($controller, $allowCA)){
			\Common\Http\Http::redirect(404);
		}
		if(!in_array($action, $allowCA[$controller])){
			\Common\Http\Http::redirect(404);
		}

		
		$className = '\\'.GAPP_APPNAME.'\\Controller\\'.$controller.'Con';
		$actionName = $action.'Action';
		$class = new $className($controller,$action);
		$class->init();
		$class->$actionName();
	}
}
