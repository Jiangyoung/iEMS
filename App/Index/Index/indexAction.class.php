<?php
/**
 * Created by PhpStorm.
 * User: Jiangyoung
 * Date: 2015/5/5
 * Time: 11:25
 */
namespace Index\Index;
use Common\Action\BaseAction;
use Common\Util\Pagination;
use Index\Model\Equipment;

class indexAction extends BaseAction{

    public function execute(){

        header('content-type:text/html;charset=utf-8');
        $this->setRenderValues('title','index');

        $pa = new Pagination();

        $nav = $pa->getNav();

        echo $nav;exit;

        $this->render('index/index_index.php');
    }
}