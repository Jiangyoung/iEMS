<?php
/*
 * admin入口文件
 *
 */

define('GAPP_BASEDIR', dirname(__DIR__).'/App');
define('GAPP_APPNAME', 'Admin');
define('GAPP_TPLDIR', GAPP_BASEDIR.'/../templates');

require GAPP_BASEDIR . '/' . 'Common/Autoload/Autoload.class.php';

\Common\Autoload\Autoload::start();

\Common\App::run('admin_allow_ca');