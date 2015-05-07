<?php
namespace Common\Util;
class Http{


	static function getGET($key,$default=false){
		return isset($_GET[$key])?htmlspecialchars($_GET[$key],ENT_QUOTES):$default;
	}

	/**
	 * 用 htmlspecialchars()处理
	 * @param $key
	 * @param bool $default
	 * @return bool|string
	 */
	static function getPOST($key,$default=false){
		return isset($_POST[$key])?htmlspecialchars($_POST[$key],ENT_QUOTES):$default;
	}


    static function getREQUEST($key,$default=false){
    	return isset($_REQUEST[$key])?htmlspecialchars($_REQUEST[$key],ENT_QUOTES):$default;
    }


    static function getCOOKIE($key,$default=false){
    	return isset($_COOKIE[$key])?htmlspecialchars($_COOKIE[$key],ENT_QUOTES):$default;
    }


    static function getSESSION($key,$default=false){
    	return isset($_SESSION[$key])?htmlspecialchars($_SESSION[$key],ENT_QUOTES):$default;
    }



	static function redirect($url){
		switch($url){
			case GAPP_FORBIDDEN_CONTROLLER:
			case GAPP_FORBIDDEN_ACTION:
			case GAPP_TOKEN_VERIFY_FAILED:
			case GAPP_WRONG_VERIFYCODE:

				header('HTTP/1.1 404 Not Found');
				echo '404 Not Found';
				exit;

				break;
			default:
				header('Location: '.$url);
				break;
		}
	}
}


?>