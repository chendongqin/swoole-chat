<?php
/**
 * Created by PhpStorm.
 * User: dongq
 * Date: 2019/1/16
 * Time: 22:34
 */

/**
 * 开启多个子进程处理数据
 */

echo 'beginTime:'.date('Y-m-d H:i:s');

$workers = [];
$tasks = [
    'task1'=>2,
    'task2'=>1,
    'task3'=>4,
    'task4'=>1,
    'task5'=>3,
    'task6'=>1,
];
$total = count($tasks);
for ($i = 0;$i<$total;$i++){
    $process = new swoole_process(function(swoole_process $pro) use($i,$tasks){
        $res = doTask($tasks[$i]);
        echo $res.PHP_EOL;
    },true);
    $pid = $process->start();
    $workers[$pid] = $process;
}

foreach ($workers as $process){
    echo $process->read();
}

function doTask($time){
    sleep($time);
    return '执行了'.$time.'s';
}

echo 'endTime:'.date('Y-m-d H:i:s');