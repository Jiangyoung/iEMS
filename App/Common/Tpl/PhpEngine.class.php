<?php
namespace Common\Tpl;
class PhpEngine{
	private static $templateDirPath = GAPP_TPLDIR;
	function __construct(){

	}

	/**
	 * @param $params 参数
	 * @param $fileName 文件 (路径为 templates/$fileName)
	 * @return string 返回渲染完成后的html代码
	 */
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

	/**
	 * @param $file 文件名
	 * @return string 返回对应文件名的URL
	 */
	function getFileUrl($file){
		$baseUrl = substr($_SERVER['REQUEST_URI'],0,strrpos($_SERVER['REQUEST_URI'],'/'));
		if('/' != substr($baseUrl,-1)){
			$baseUrl .= '/';
		}
		return $baseUrl.$file;
	}
}