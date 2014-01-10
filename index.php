<?php
//app constants
define('DS', DIRECTORY_SEPARATOR);
define('BASE_PATH', realpath(dirname(__FILE__)));
define('FRAMEWORK_PATH',BASE_PATH.DS.'Framework'.DS);
//load the autloader
require FRAMEWORK_PATH .'Autoloader.php';

use Framework\Http\Response\ViewResponse;
new ViewResponse(BASE_PATH.DS.'views/name.php',array("name"=>"hola"));