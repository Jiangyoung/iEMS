<?php
namespace Index\Controller;
class IndexCon extends \Common\Controller\BaseController{
	function indexAction(){
		$equipment = new \Common\Model\Equipment();
		$insert_id = $equipment->insert(array('name'=>'电脑呀','status'=>0,'desc'=>'秒数蜀山'));
		$this->setRenderValues('key1',$insert_id);
		$this->setRenderValues('title','index');
		$this->render('index_list.php');
	}
}