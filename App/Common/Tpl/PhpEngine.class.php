<?php
namespace Common\Tpl;
class PhpEngine{
	private static $templateDirPath = GAPP_TPLDIR;
	function __construct(){

	}
	
	function fetch($params,$fileName){
		$filePath = self::$templateDirPath.'/'.$fileName;
		if(!file_exists($filePath)){
			die('File "'.$filePath.'" does not exists!');
		}
		foreach ((array)$params as $key => $value) {
			$this->$key = $value;
		}
		ob_start();
		include $filePath;
		$ret = ob_get_contents();
		ob_end_clean();
		return $ret;
	}
	function load($fileName,$params = array()){
		$filePath = self::$templateDirPath.'/'.$fileName;
		if(!file_exists($filePath)){
			return ;
			//die('File "'.$filePath.'" does not exists!');
		}else{
			extract((array)$params);
			include $filePath;
		}
	}
}