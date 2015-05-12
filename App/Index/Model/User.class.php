<?php
namespace Index\Model;

use Common\Model\BaseModel;

class User extends BaseModel{
    protected $tbName = 'user';
    protected $tbFields = array('id','username','password','type','remark');

    /**
     * @param string $username
     * @param string $password
     * @return bool
     */
    function validatePassword($username,$password){
        $conn = $this->getConnect();
        $username = $conn->real_escape_string($username);
        $password = $conn->real_escape_string($password);
        $sql = $conn->assembleSelectSQL($this->tbName,$this->tbFields," WHERE `username`='{$username}' AND `deleted`='n' LIMIT 1");

        $res = $conn->execute_dql($sql);
        if(isset($res[0])){
            $sql = $conn->assembleSelectSQL($this->tbName,$this->tbFields," WHERE `password`='{$password}' AND `deleted`='n' LIMIT 1");

            $res = $conn->execute_dql($sql);
            if($res[0]){
                $_SESSION['_USER_INFO'] = $res[0];
                return true;
            }
        }else{
            return false;
        }
    }
    function checkParams($params){
        $check = $this->getCheck();
        $check->check_password($params['password'],$params['password2']);
        $check->check_length($params['username'],1,15,'用户名');
        $check->check_phone($params['phone']);
        $check->checkUploadFile($params['photo_path'],'头像');
        if(!empty($params['username'])){
            $this->checkUsername($params['username'],$check);
        }
        $err = $check->getError();
        if(empty($err)){
            return true;
        }
        return false;
    }
    function checkUsername($username,$check){
        $conn = $this->getConnect();
        $username = $conn->real_escape_string($username);
        $sql = $conn->assembleSelectSQL($this->tbName,array('id')," WHERE `username`='{$username}' AND `deleted`='n' ");
        $res = $conn->execute_dql($sql);
        if(!$res){
            return true;
        }
        $check->setError('用户名已存在.');
        return false;
    }
}