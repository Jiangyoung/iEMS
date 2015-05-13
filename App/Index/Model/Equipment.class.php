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
  `status` TINYINT UNSIGNED DEFAULT 0,
  `type` TINYINT UNSIGNED DEFAULT 0,
  `description` VARCHAR(128) DEFAULT '',
  `remark` VARCHAR(128) DEFAULT '',
  `deleted` ENUM('n','y') DEFAULT 'n'
);
 */
class Equipment extends BaseModel{
    protected $tbName = 'equipment';
    protected $tbFields = array('id','name','model','create_time','status','type','description','remark');



}