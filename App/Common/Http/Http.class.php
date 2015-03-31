<?php
namespace Common\Http;
class Http{

	/**
	 *
	 * 用 htmlspecialchars()处理
	 *
	 */
	static function getGET($key,$default=false){
		return isset($_GET[$key])?htmlspecialchars($_GET[$key],ENT_QUOTES):$default;
	}

	/**
	 *
	 * 用 htmlspecialchars()处理
	 *
	 */
	static function getPOST($key,$default=false){
		return isset($_POST[$key])?htmlspecialchars($_POST[$key],ENT_QUOTES):$default;
	}

    /**
	 *
	 * 用 htmlspecialchars()处理
	 *
	 */
    static function getREQUEST($key,$default=false){
    	return isset($_REQUEST[$key])?htmlspecialchars($_REQUEST[$key],ENT_QUOTES):$default;
    }

    /**
	 *
	 * 用 htmlspecialchars()处理
	 *
	 */
    static function getCOOKIE($key,$default=false){
    	return isset($_COOKIE[$key])?htmlspecialchars($_COOKIE[$key],ENT_QUOTES):$default;
    }

    /**
	 *
	 * 用 htmlspecialchars()处理
	 *
	 */
    static function getSESSION($key,$default=false){
    	return isset($_SESSION[$key])?htmlspecialchars($_SESSION[$key],ENT_QUOTES):$default;
    }



	static function redirect($url){
		if(404 == $url){
			header('HTTP/1.1 404 Not Found');
    		echo '404 Not Found';
		}else{
			header('Location: '.$url);
		}
			
		
	}
}


?>