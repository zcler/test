<?php

namespace cli;

class Cli{

	private static $cliArg;
	
	public static function run(){
		self::getCliArg();
		
	}
	
	public static function getCliArg(){
		global $argv;
		self::$cliArg=$argv;
	}

	
}