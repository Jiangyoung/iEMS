<?php
namespace Common\Controller;

use Common\Util\Http;
use \Common\Tpl\PhpEngine;

class BaseController{
	protected $renderValues = array();
	//请求类型判断
	protected $isGet = false;
	protected $isPost =false;
	//请求参数
	protected $requestParam = array('get'=>array(),'post'=>array());
	private $view = null;
	final function __construct($controllerName,$actionName){
		//用php模板
		$this->view = new PhpEngine();

		//设置常用属性 isGet / isPost ...
		if('POST' == $_SERVER['REQUEST_METHOD']){
			//token验证
			$this->verifyToken(Http::getPOST('_token'));

			$this->isPost = true;
		}else if('GET' == $_SERVER['REQUEST_METHOD']){
			//token添加
			$this->addToken();

			$this->isGet = true;
		}else{
			$this->isPost = false;
			$this->isGet = false;
		}

		//用htmlspecialchars('',ENT_QUOTES) 处理参数（get和post的）
		$filterFunc = function($s){
			return htmlspecialchars($s,ENT_QUOTES);
		};
		$this->requestParam['get'] = array_map($filterFunc,$_GET);
		$this->requestParam['post'] = array_map($filterFunc,$_POST);


		//添加模版参数controller和action
		$this->setRenderValues('controller',$controllerName);
		$this->setRenderValues('action',$actionName);
	}

	function init(){

	}

	function setRenderValues($key,$val=null){
		if(!is_array($this->renderValues)){
			$this->renderValues = (array)$this->renderValues;
		}
		if(is_array($key)){
			foreach ($key as $k => $v) {
				$this->renderValues[$k] = $v;
			}
		}else{
			$this->renderValues[$key] = $val;
		}
	}

	/**
	 * 添加token
	 * @param string $tokenName
	 * @param string $salt 干扰值
	 * token生成：md5($salt.mt_rand(50000,80000));
	 * 存入session中 md5($token)
	 */
	function addToken($tokenName='_token',$salt='!.#$1^*l'){
		$tokenCode = md5($salt.mt_rand(50000,80000));
		$_SESSION[$tokenName] = md5($tokenCode);
		$this->setRenderValues($tokenName,$tokenCode);
	}

	/**
	 * 验证token
	 * @param $tokenCode
	 * @param string $tokenName
	 * 验证完成后重置session中的值（防止重复提交）
	 */
	function verifyToken($tokenCode,$tokenName='_token'){
		if($_SESSION[$tokenName] !== md5($tokenCode)){
			Http::redirect(GAPP_TOKEN_VERIFY_FAILED);
		}
		$_SESSION[$tokenName] = '';
	}

	/**
	 * @param $template (路径为 APP_NAME/$template)
	 * @param bool $isCommon 是否为common目录下
	 */
	function render($template,$isCommon = false){
		if(!$isCommon)$template = strtolower(GAPP_APPNAME).'/'.$template;
		$pageHtml = $this->view->fetch($this->renderValues,$template);
		echo $pageHtml;
	}
}