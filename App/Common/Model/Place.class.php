<?php
namespace Common\Model;

use \Common\Database\DbMysqli;

/*
 *
CREATE TABLE `iems_place`(
`id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
`name` VARCHAR(64) DEFAULT '',
`u_id` VARCHAR(32) DEFAULT '0',
`e_id` VARCHAR(32) DEFAULT '',
`remark` VARCHAR(128) DEFAULT ''
);
 *
 */

class Place extends DbMysqli{
    protected $tbName = 'place';
    protected $tbFields = array('id','name','u_id','e_id','remark');

    protected function init(){

    }
}