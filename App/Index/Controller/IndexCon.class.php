<?php
namespace Index\Controller;
class IndexCon extends \Common\Controller\BaseController{
	function indexAction(){
		$this->setRenderValues('key1','val1');
		$this->setRenderValues('title','index');
		$this->render();
	}
}