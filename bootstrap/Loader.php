<?php
/**
 * @Author: 张成龙 413470933@qq.com
 * @date: 2018/4/13
 */

namespace bootstrap;
use cli\Cli;

class Loader {
	
	public static function __init(){
		self::loadFunction();
		spl_autoload_register('self::autoLoad');
		self::sapiRoute();
	}
	
	public static function loadFunction(){
		include_once LIB_PATH.'/functions/functions.php';
	}
	
	public static function autoLoad($className){
		include ROOT_PATH.'/'.$className.'.php';
	}
	
	public static function sapiRoute(){
		if(php_sapi_name()=='cli'){
			Cli::run();
		}else{
		
		}
	}
}