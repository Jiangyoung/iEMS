<?php
namespace Index\Controller;
class UserCon extends \Common\Controller\BaseController{
	function loginAction(){
		//echo __METHOD__;
		$db = new \Common\Database\Database();
		//$db->execute_dql('select * from cg_user');
		//$db->execute_dml('update cg_user set `age`=27');
		//$data = array('name'=>'xiaohuang','age'=>22,'height'=>175.5);
		//$id = $db->insert('user',$data);
		//var_dump($id);
		//$res = $db->execute_dql('select * from cg_user',array('id'=>'desc','name'=>'asc'),array(1,2));
		//var_dump($res);
		$this->setRenderValues('title','User');
		$this->render();
	}
}