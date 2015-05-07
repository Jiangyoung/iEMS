<?php
namespace Common;

use \Common\Util\Http;
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

		
		$actionPath = '\\'.GAPP_APPNAME.'\\'.$controller;
		$actionName = $actionPath.'\\'.$action.'Action';
		$obj = new $actionName;
		$obj->execute();
	}
}
