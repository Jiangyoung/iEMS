<?php
namespace Common\Model;

use \Common\Database\DbMysqli;

/*
 *
CREATE TABLE `iems_equipment`(
`id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
`name` VARCHAR(64) DEFAULT '',
`type` TINYINT UNSIGNED DEFAULT 0,
`description` VARCHAR(256) DEFAULT '',
`remark` VARCHAR(128) DEFAULT ''
);
 *
 */

class Equipment extends DbMysqli{

    protected $tbName = 'equipment';
    protected $tbFields = array('id','name','status','desc');

    protected function init(){
    }
}