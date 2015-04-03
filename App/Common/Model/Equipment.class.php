<?php
namespace Common\Model;
class Equipment extends \Common\Database\DbMysqli{

    protected $tbName = 'equipment';
    protected $tbFields = array('id','name','status','desc');

    protected function init(){
    }
}