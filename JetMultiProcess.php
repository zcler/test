<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/22 0022
 * Time: 下午 10:04
 * @link http://www.huyanping.cn/%E5%9F%BA%E4%BA%8Epcntl%E7%9A%84php%E5%B9%B6%E5%8F%91%E7%BC%96%E7%A8%8B/
 * @information 看看他的生产消费模型
 */
class JetMultiProcess {

    //最大队列长度
    private $size;
    private $curSize;
    //生产者
    private $producer;
    //消费者
    private $worker;
    /**
     * 构造函数
     * @param string $worker 需要创建的消费者类名
     * @param int $size 最大子进程数量
     * @param $producer 需要创建的消费者类名
     */
    public function __construct($producer, $worker, $size=10){
        $this->producer = new $producer;
        $this->worker = $worker;
        $this->size = $size;
        $this->curSize = 0;
    }

    public function start(){
        $producerPid = pcntl_fork();
        if ($producerPid == -1) {
            die("could not fork");
        } else if ($producerPid) {// parent
            while(true){
                $pid = pcntl_fork();
                if ($pid == -1) {
                    die("could not fork");
                } else if ($pid) {// parent
                    $this->curSize++;
                    if($this->curSize>=$this->size){
                        $sunPid = pcntl_wait($status);
                        $this->curSize--;
                    }
                } else {// worker
                    $worker = new $this->worker;
                    $worker->run();
                    exit();
                }
            }
        } else {// producer
            $this->producer->run();
            exit();
        }
    }
}