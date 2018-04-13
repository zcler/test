<?php

ini_set('display_errors',E_ALL);
ini_set('error_reporting',1);


define("ROOT_PATH",__DIR__);
define("LIB_PATH",ROOT_PATH.'/library');

include_once ROOT_PATH.'/bootstrap/Loader.php';

\bootstrap\Loader::__init();
