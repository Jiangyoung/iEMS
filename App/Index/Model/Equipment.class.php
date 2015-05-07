<?php
namespace Index\Model;

use Common\Model\BaseModel;

class Equipment extends BaseModel{
    protected $tbName = 'equipment';
    protected $tbFields = array('id','name','type','description','remark');

}