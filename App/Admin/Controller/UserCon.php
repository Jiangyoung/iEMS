<?php
/**
 * Created by PhpStorm.
 * User: jiangyoung
 * Date: 2015/4/8
 * Time: 20:41
 */

namespace Admin\Controller;


class UserCon extends \Common\Controller\BaseController{
    function loginAction(){
        $this->render('login.php');
    }
}