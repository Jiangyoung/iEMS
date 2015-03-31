<?php
namespace Common\Database;
class TableBase{
	protected $db = null;

	public function __construct(){
		$this->db = new \Common\Database\Database();
		
	}
}








?>