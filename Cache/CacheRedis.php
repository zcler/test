<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/2 0002
 * Time: 下午 10:57
 */

namespace test\Cache;


class CacheRedis
{
    private static $connection=null;
    
    
    public static function getRedis(){
        if(is_null(self::$connection)){
            self::$connection=new \Redis();
            self::$connection->connect('127.0.0.1');
        }
        return self::$connection;
    }
    
}