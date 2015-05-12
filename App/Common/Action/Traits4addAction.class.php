<?php
/**
 * Created by PhpStorm.
 * User: Jiangyoung
 * Date: 2015/5/12
 * Time: 12:55
 */
namespace Common\Action;

trait Traits4addAction{

    function execute(){
        $renderTpl = $this->getInsertRenderTpl();
        if($this->isPost){
            $model = $this->getInsertModel();
            if($model->checkParams($_POST)){
                $params = $this->formatForInsert($this->posts);
                $insert_id = $model->insertOne($params);
                $this->afterForInsert($insert_id);
            }else{
                $this->addToken();
                $this->setRenderValues('postData',$_POST);
                $this->setRenderValues('errMsg',$model->getCheckErr());
                $this->render($renderTpl);
            }


        }else{
            $postData = $this->getInsertPostData();
            $this->setRenderValues('postData',$postData);
            $this->render($renderTpl);
        }
    }
    abstract function getInsertModel();
    abstract function getInsertPostData();
    abstract function getInsertRenderTpl();
    abstract function formatForInsert($params);
    abstract function afterForInsert($insert_id);
}