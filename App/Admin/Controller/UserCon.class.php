<?php
/**
 * Created by PhpStorm.
 * User: jiangyoung
 * Date: 2015/4/8
 * Time: 20:41
 */

namespace Admin\Controller;

use \Common\Controller\BaseController;
use \Common\Http\Http;

class UserCon extends BaseController{

    function addAction(){
        $tokenName = '_token';
        if($this->isPost){


        }else{
            $this->render('add_user.php',true);
        }
    }


    function loginAction(){
        if($this->isPost){


        }else{
            $this->render('login.php');
        }
    }

    function logoutAction(){
        unset($_SESSION['iems_user_info']);
        Http::redirect('admin.php');
    }
}