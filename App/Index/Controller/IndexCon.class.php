<?php
namespace Index\Controller;
class IndexCon extends \Common\Controller\BaseController{

	function init(){
		$this->setRenderValues('title','iEMS | 设备管理系统 | 毕设呀呀呀呀');
		$this->setRenderValues('keyword','iEMS,设备管理系统');
		$this->setRenderValues('description','设备管理系统呀呀呀呀');
	}

	function indexAction(){
		$equipmentObj = new \Common\Model\Equipment();
		//$insert_id = $equipmentObj->insertOne(array('name'=>'电脑呀','status'=>0,'desc'=>'秒数蜀山'));
		//$this->setRenderValues('key1',$insert_id);
		$equip = $equipmentObj->getRowById(2);
		$this->setRenderValues('key1',json_encode($equip,JSON_UNESCAPED_UNICODE));
		$this->render('index_list.php');
	}
}