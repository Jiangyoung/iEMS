<?php
namespace Common\Controller;
class BaseController{
	protected $renderValues = array();
	private $view = null;
	final function __construct(){

		//用php模板
		$this->view = new \Common\Tpl\PhpEngine();

		/*
		//设置smarty模板
		$this->view = \Common\Tpl\SmartyEngine::getEngine();
		*/
	}
	function init(){
		$this->setRenderValues('title','');
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
	function render($template){
		$template = GAPP_TPLDIR.'/'.$template;
		if(!file_exists($template)){
			\Common\Http\Http::redirect(404);
			exit;
		}
		$pageHtml = $this->view->fetch($this->renderValues,$template);
		echo $pageHtml;

	}
}