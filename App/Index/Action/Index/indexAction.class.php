<?php
/**
 * Created by PhpStorm.
 * User: Jiangyoung
 * Date: 2015/5/5
 * Time: 11:25
 */
namespace Index\Action\Index;
use Common\Action\BaseAction;
use Common\Util\Http;

class indexAction extends BaseAction{

    public function execute(){
        $case = Http::getGET('case');
        if('top' == $case){
            $this->render('index/index_top.php');
        }else if('left' == $case){
            $this->render('index/index_left.php');
        }else if('footer' == $case){
            $this->render('index/index_footer.php');
        }else{
            $this->render('index/index_index.php');
        }
    }
}