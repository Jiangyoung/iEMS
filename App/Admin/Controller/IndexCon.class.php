<?php
/**
 * Created by PhpStorm.
 * User: jiangyoung
 * Date: 2015/4/8
 * Time: 20:21
 */

namespace Admin\Controller;

use \Common\Controller\BaseController;

class IndexCon extends BaseController{
    function indexAction(){
        $this->setRenderValues('title','管理中心');
        $this->render('index.php');
    }

}