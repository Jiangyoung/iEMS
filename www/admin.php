<?php
/*
 * admin入口文件
 *
 */

define('GAPP_BASEDIR', dirname(__DIR__).'/App');
define('GAPP_APPNAME', 'index');

require GAPP_BASEDIR . '/' . 'Common/Autoload/Autoload.class.php';

\Common\Autoload\Autoload::start();

\Common\App::run();