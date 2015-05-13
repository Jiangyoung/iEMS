<?php
/**
 * Created by PhpStorm.
 * User: Jiangyoung
 * Date: 2015/5/14
 * Time: 0:23
 */
namespace Index\Model;
use Common\Model\BaseModel;

/*
DROP TABLE IF EXISTS `iems_maintain`;
CREATE TABLE IF NOT EXISTS `iems_maintain`(
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

class Maintain extends BaseModel{
    protected $tbName = 'maintain';
    protected $tbFields = array();
}