<?php
namespace Index\Model;

use Common\Model\BaseModel;

/*
DROP TABLE IF EXISTS `iems_equipment`;
CREATE TABLE IF NOT EXISTS `iems_equipment`(
  `id` INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  `name` VARCHAR(32) DEFAULT '',
  `model` VARCHAR(64) DEFAULT '',
  `create_time` INT DEFAULT 0,
  `state` TINYINT UNSIGNED DEFAULT 0,
  `type` TINYINT UNSIGNED DEFAULT 0,
  `description` VARCHAR(128) DEFAULT '',
  `remark` VARCHAR(128) DEFAULT '',
  `deleted` ENUM('n','y') DEFAULT 'n'
);
 */
class Equipment extends BaseModel{
    protected $tbName = 'equipment';
    protected $tbFields = array('id','name','model','create_time','state','type','description','remark');

    function getTypes(){
        return array(0,1,2,3,4);
    }
    function getTypeText($type){
        $text = '';
        switch($type){
            case 0:
                $text = '其他';
                break;
            case 1:
                $text = '机械设备';
                break;
            case 2:
                $text = '电子设备';
                break;
            case 3:
                $text = '大型设备';
                break;
            case 4:
                $text = '精密仪器';
                break;
            default:
                $text = '未归类设备';
        }
        return $text;
    }
    function getTypeTexts(){
        $res = array();
        $types = $this->getTypes();
        foreach($types as $type){
            $res[$type] = $this->getTypeText($type);
        }
        return $res;
    }

    function getStates(){
        return array(0,1,2,3,4);
    }
    function getStateText($state){
        $text = '';
        switch($state){
            case 0:
                $text = '在总仓库中';
                break;
            case 1:
                $text = '在实验室中';
                break;
            case 2:
                $text = '维护中';
                break;
            case 3:
                $text = '出借中';
                break;
            case 4:
                $text = '已报废';
                break;
            default:
                $text = '未知状态';
        }
        return $text;
    }
    function getStateTexts(){
        $res = array();
        $states = $this->getStates();
        foreach($states as $state){
            $res[$state] = $this->getStateText($state);
        }
        return $res;
    }

    function checkParams($params){
        $check = $this->getCheck();
        $check->check_length($params['name'],1,15,'设备名称');
        $check->check_length($params['model'],1,64,'设备型号');
        $check->check_length($params['description'],1,128,'设备描述');

        $err = $check->getError();
        if(empty($err)){
            return true;
        }
        return false;
    }


}