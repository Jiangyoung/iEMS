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

	static function getBaseUrl(){
		$baseUrl = substr($_SERVER['REQUEST_URI'],0,strrpos($_SERVER['REQUEST_URI'],'/'));
		$baseUrl = rtrim($baseUrl,'/');
		return $baseUrl;
	}

	static function https_request($url,$data=''){
		$curl = curl_init();
		curl_setopt($curl,CURLOPT_URL,$url);
		curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,FALSE);
		curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,FALSE);
		if(!empty($data)){
			curl_setopt($curl,CURLOPT_POST,1);
			curl_setopt($curl,CURLOPT_POSTFIELDS,$data);
		}
		curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
		$output = curl_exec($curl);
		curl_close($curl);
		return $output;
	}






	static function redirect($url){
		switch($url){
			case GAPP_FORBIDDEN_CONTROLLER:
			case GAPP_FORBIDDEN_ACTION:
			case GAPP_TOKEN_VERIFY_FAILED:
			case GAPP_WRONG_VERIFYCODE:
			case GAPP_PASSWORD_VERIFY_FAILED:

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