<?php
/**
 * @Author: 张成龙 413470933@qq.com
 * @date: 2017/11/22
 */


/**
 * 打印变量
 * @param mixed $var
 */
function p($var){
	if (is_bool($var)) {
		var_dump($var);
	} else if (is_null($var)) {
		var_dump(NULL);
	} else {
		echo "<pre style='position:relative;z-index:1000;padding:10px;border-radius:5px;background:#F5F5F5;border:1px solid #aaa;font-size:14px;line-height:18px;opacity:0.9;'>" . print_r($var, true) . "</pre>";
	}
}

/**
 * @param string $dataBaseName
 *
 * @return \PDO object
 */
function getModel($dataBaseName){
	if(empty($dataBaseName)) return false;
	static $model;
	if(empty($model[$dataBaseName])){
		$model[$dataBaseName]=new \PDO('mysql:dbname='.$dataBaseName.';host=127.0.0.1','root','', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	}
	return $model[$dataBaseName];
}