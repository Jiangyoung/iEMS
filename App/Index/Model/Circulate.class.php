<?php
/**
 * Created by PhpStorm.
 * User: Jiangyoung
 * Date: 2015/5/14
 * Time: 0:31
 */
namespace Index\Model;

use Common\Model\BaseModel;

/*
DROP TABLE IF EXISTS `iems_circulate`;
CREATE TABLE IF NOT EXISTS `iems_circulate`(
  `id` INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  `type` TINYINT UNSIGNED DEFAULT 0,
  `state` TINYINT UNSIGNED DEFAULT 0,
  `e_id` INT UNSIGNED DEFAULT 0,
  `u_id` INT UNSIGNED DEFAULT 0,
  `admin_id` INT UNSIGNED DEFAULT 0,
  `create_time` INT DEFAULT 0,
  `remark` VARCHAR(128) DEFAULT '',
  `deleted` ENUM('n','y') DEFAULT 'n'
);
 */

class Circulate extends BaseModel{
    protected $tbName = 'circulate';
    protected $tbFields = array('id','type','state','e_id','u_id','admin_id','create_time','remark','deleted');
}