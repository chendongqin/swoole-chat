<?php
/**
 * Created by PhpStorm.
 * User: dongq
 * Date: 2019/1/15
 * Time: 21:58
 */

$http = new Swoole\Http\Server("0.0.0.0", 9501);
$http->set([
    'enable_static_handler'=> true,
    'document_root'=>__DIR__."/../public/static"
]);

$http->on('WorkerStart' ,function (swoole_server $server ,$worker_id){
    define('APP_PATH', __DIR__ . '/../application/');
    define('PUBLIC_PATH', __DIR__ .  '/');
    require __DIR__ . '/../thinkphp/base.php';
});


$http->on('request', function ($request, $response) {
    if(!empty($request->get)){
        $_GET = $request->get;
    }
    if(!empty($request->post)){
        $_POST = $request->post;
    }
    if(!empty($request->cookie)){
        $_COOKIE = $request->cookie;
    }
    if(!empty($request->files)){
        $_FILES = $request->files;
    }
    if(!empty($request->server)){
        foreach ($request->server as $key =>$value){
            $_SERVER[strtoupper($key)] = $value;
        }
    }
    think\App::run()->send();

});
$http->start();