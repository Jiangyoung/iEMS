<?php
namespace Common\Controller;
class BaseController{
	protected $renderValues = array();
	private $view = null;
	final function __construct($controllerName,$actionName){
		//用php模板
		$this->view = new \Common\Tpl\PhpEngine();

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
	function render($template){
		$pageHtml = $this->view->fetch($this->renderValues,$template);
		echo $pageHtml;
	}
}