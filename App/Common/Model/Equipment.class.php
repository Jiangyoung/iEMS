<?php
namespace Common\Model;
class Equipment extends \Common\Database\DbMysqli{
    private $fields = array('id','name','status','description');
    protected $tbName = 'equipment';
}