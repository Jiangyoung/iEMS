<?php
namespace Index\Controller;

use \Common\Controller\BaseController;

class UserCon extends BaseController{

	function addAction(){

	}

	function loginAction(){

		if('post' == $_SERVER['REQUEST_METHOD']){


		}else{
			$this->render('login.php');
		}
	}

	function logoutAction(){
		unset($_SESSION['iems_user_info']);
		Http::redirect('admin.php');
	}
}