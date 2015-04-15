<?php
namespace Index\Controller;

use \Common\Controller\BaseController;
use \Common\Model\Equipment;
use \Common\Http\Http;
use Common\Model\User;
use \Common\Util\String;
use \Common\Util\Image;


class IndexCon extends BaseController{

	function init(){
		$this->setRenderValues('title','iEMS | 设备管理系统 | 毕设呀呀呀呀');
		$this->setRenderValues('keyword','iEMS,设备管理系统');
		$this->setRenderValues('description','设备管理系统呀呀呀呀');
	}

	function indexAction(){

		$equipmentObj = new Equipment();
		//$insert_id = $equipmentObj->insertOne(array('name'=>'电脑呀','status'=>0,'desc'=>'秒数蜀山'));
		//$this->setRenderValues('key1',$insert_id);
		$equip = $equipmentObj->getRowById(2);
		$this->setRenderValues('key1',json_encode($equip,JSON_UNESCAPED_UNICODE));
		$this->setRenderValues('key2',String::randString(6,1,'中文'));
		$this->render('index_list.php');
	}

	function getVerifyCodeAction(){
		Image::buildImageVerify(4,1,'png',50,24,'login_verify');
	}
}