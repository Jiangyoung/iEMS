<?php
/*
 * index入口文件
 *
 */

if(!stripos($_SERVER['REQUEST_URI'],'index.php')){
    header('HTTP/1.1 301 Moved Permanently');
    header('Location:index.php');
}

define('GAPP_BASEDIR', dirname(__DIR__).'/App');
define('GAPP_APPNAME', 'Index');
define('GAPP_TPLDIR', GAPP_BASEDIR.'/../templates');
define('GAPP_ROOT_PATH',GAPP_BASEDIR.'/../www');


define('GAPP_ROOT_URL',dirname($_SERVER['REQUEST_URI']));

require GAPP_BASEDIR . '/' . 'Common/Autoload/Autoload.class.php';

session_start();

\Common\Autoload\Autoload::start();

\Common\App::run('index_allow_ca');
