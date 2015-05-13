<?php
/**
 * Created by PhpStorm.
 * User: Jiangyoung
 * Date: 2015/5/12
 * Time: 17:37
 */
namespace Index\Model;

use Common\Model\BaseModel;

/*
DROP TABLE IF EXISTS `iems_place`;
CREATE TABLE IF NOT EXISTS `iems_place`(
  `id` INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  `location` TINYINT UNSIGNED DEFAULT 0,
  `name` VARCHAR(32) DEFAULT '',
  `admin_ids` VARCHAR(32) DEFAULT '',
  `remark` VARCHAR(128) DEFAULT '',
  `deleted` ENUM('n','y') DEFAULT 'n'
);
 */

class Place extends BaseModel{
    protected $tbName = 'place';
    protected $tbFields = array('id','location','name','admin_ids','remark');
}