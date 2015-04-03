<?php
/*
 * index入口文件
 *
 */

define('GAPP_BASEDIR', dirname(__DIR__).'/App');
define('GAPP_APPNAME', 'index');
define('GAPP_TPLDIR', GAPP_BASEDIR.'/../templates/'.GAPP_APPNAME);

require GAPP_BASEDIR . '/' . 'Common/Autoload/Autoload.class.php';

\Common\Autoload\Autoload::start();

\Common\App::run('index_allow_ca');
