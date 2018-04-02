<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/2 0002
 * Time: 下午 10:56
 */

namespace test\Worker;

use test\Cache\CacheRedis;

class GetNumber
{
    public function run(){
        $redis=CacheRedis::getRedis();
        $num=$redis->lPop('test_queue');
        if(empty($num)){
            sleep(1);
        }else{
            echo $num ."\n";
        }
    }
}