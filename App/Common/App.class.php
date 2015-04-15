<?php
namespace Common;

use \Common\Http\Http;
use \Common\Config\ConfigHelper;

class App{
	static function run($ConActConfigName){

		//加载常量配置文件
		ConfigHelper::loadConfigs('constant');

		$controller = ucfirst(Http::getGET('c','index'));
		$action  = Http::getGET('a','index');

		$allowCA = ConfigHelper::getConfigs($ConActConfigName);

		if(!array_key_exists($controller, $allowCA)){
			Http::redirect(GAPP_FORBIDDEN_CONTROLLER);
		}
		if(!in_array($action, $allowCA[$controller])){
			Http::redirect(GAPP_FORBIDDEN_ACTION);
		}

		
		$className = '\\'.GAPP_APPNAME.'\\Controller\\'.$controller.'Con';
		$actionName = $action.'Action';
		$class = new $className($controller,$action);
		$class->init();
		$class->$actionName();
	}
}
