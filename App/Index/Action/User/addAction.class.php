<?php
namespace Index\Action\User;
use Common\Util\Http;
use Index\Model\User;
use Common\Action\BaseAction;
use Common\Action\Traits4addAction;

class addAction extends BaseAction{
    use Traits4addAction;
    protected function init(){
        $this->setRenderValues('actionName','添加用户');
    }

    function getInsertModel(){
        $model = new User();
        return $model;
    }

    function getInsertRenderTpl(){
        return 'index/user_add.php';
    }
    function getInsertPostData(){
        return array(
            'username'=>'',
            'nickname'=>'',
            'password'=>'',
            'password2'=>'',
            'phone'=>'',
            'email'=>'',
            'remark'=>'',
            'photo_path'=>''
        );
    }
    function formatForInsert($params){
        $params['password'] = md5($params['password']);
        return $params;
    }

    function afterForInsert($insert_id){
        Http::redirect('index.php?c=user&a=list');
    }



    /*
    public function execute(){
        if($this->isPost){
            $user = new User();

            if($user->checkParams($_POST)){
                $params = $this->formatForInsert($this->posts);
                $insert_id = $user->insertOne($params);
                var_dump($_POST,$insert_id);
            }else{
                $this->addToken();
                $this->setRenderValues('postData',$_POST);
                $this->setRenderValues('errMsg',$user->getCheckErr());
                $this->render('index/user_add.php');
            }


        }else{
            $postData = array(
                'username'=>'',
                'nickname'=>'',
                'password'=>'',
                'password2'=>'',
                'remark'=>'',
                'phone'=>'',
                'email'=>''
            );
            $this->setRenderValues('postData',$postData);
            $this->setRenderValues('actionName','添加用户');
            $this->render('index/user_add.php');
        }
    }
    function formatForInsert($params){
        $params['password'] = md5($params['password']);
        return $params;
    }
    */
}