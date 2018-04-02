<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/2 0002
 * Time: 下午 11:02
 */

namespace test\Producer;

set_time_limit(30);
use test\Cache\CacheRedis;

class SetNumber
{
    public static $num=0;

    public function run(){
        $redis=CacheRedis::getRedis();
        while(true){
            $redis->rPush('test_queue',self::$num++);
            usleep(10000);
        }
    }
}