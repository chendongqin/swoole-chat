<?php
/**
 * Created by PhpStorm.
 * User: Viter
 * Date: 2018/3/4
 * Time: 15:41
 */
namespace app\index\controller;
use think\Config;
use think\Session;
use base\Base;
use think\Db;
 class Index extends Base{

     public function index(){
         echo '123';
//         $this->fetch('index.phtml');
     }

     public function test(){
         var_dump($_GET);
     }

 }