<?php
/**
 * Created by PhpStorm.
 * User: Jiangyoung
 * Date: 2015/5/5
 * Time: 11:25
 */
namespace Index\Index;
use Common\Action\BaseAction;
use Index\Model\Equipment;

class indexAction extends BaseAction{

    public function execute(){


        $e = new Equipment();
        $list = $e->getList(2);
        var_dump($list);
        $this->setRenderValues('title','index');
        $this->setRenderValues('list',$list);
        $res = $this->render('index/index_list.php');
    }
}