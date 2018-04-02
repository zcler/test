<?php


include './JetMultiProcess.php';
include './Producer/SetNumber.php';
include './Worker/GetNumber.php';
include './Cache/CacheRedis.php';

$queue=new JetMultiProcess(new \test\Producer\SetNumber(),new \test\Worker\GetNumber());


$queue->start();






