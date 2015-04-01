<?php
namespace Common;
class App{
	static function run(){

		$controller = ucfirst(\Common\Http\Http::getGET('c','index'));
		$action  = \Common\Http\Http::getGET('a','index');

		$allowCA = \Common\Config\ConfigHelper::getConfigs('allowca');

		if(!array_key_exists($controller, $allowCA)){
			\Common\Http\Http::redirect(404);
		}
		if(!in_array($action, $allowCA[$controller])){
			\Common\Http\Http::redirect(404);
		}

		
		$className = '\\'.GAPP_APPNAME.'\\Controller\\'.$controller.'Con';
		$action .= 'Action';

		$class = new $className();
		$class->init();
		$class->$action();
	}
	/*
	private function parseUrl(){
		$arrPathInfo = array();
		if(isset($_SERVER['PATH_INFO'])){
			$usefulStr = substr($_SERVER['PATH_INFO'], 1,strrpos($_SERVER['PATH_INFO'], '.'));
			$extension = pathinfo($usefulStr,PAHTINFO_EXTENSION);

			$arrPathInfo = explode('/', $usefulStr);
			
			if('htm' != $extension || count($arrPathInfo)){
				header('Location:404.php');
				exit(0);
			}

			return $arrPathInfo;
		}
	}
	*/
}