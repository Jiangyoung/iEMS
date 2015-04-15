<?php
namespace Common\Model;

use \Common\Database\DbMysqli;

/*
 *
CREATE TABLE `iems_user`(
`id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
`username` VARCHAR(32) NOT NULL,
`nickname` VARCHAR(32) default '',
`password` VARCHAR(64) NOT NULL,
`type` TINYINT UNSIGNED DEFAULT 0,
`remark` VARCHAR(128) DEFAULT ''
);
 *
 */

class User extends DbMysqli{
    protected $tbName = 'user';
    protected $tbFields = array('id','username','nickname','password','type','remark');

    /**
     * @param string $name
     * @return bool/string
     */
    function getUserInfoByName($name){
        $name = $this->conn->escape_string($name);
        $tbName = $this->tbPrefix.'user`';
        $selectFields = $this->assembleAllFields();
        $sql = "SELECT {$selectFields} FROM `{$tbName}` WHERE `username`='{$name}'";
        $res = $this->execute_dql($sql);
        if($res){
            $row = $res->fetch_assoc();
            $res->free();
            return $row;
        }
        return false;
    }
}