<?php
/**
 * Created by PhpStorm.
 * User: Viter
 * Date: 2018/3/4
 * Time: 19:38
 */
namespace base;
use think\Controller;
use think\Session;
class Base extends Controller{

    protected function _initialize()
    {
        parent::_initialize(); // TODO: Change the autogenerated stub
        $session = new Session();
        $user = $session->get('user');
        $user = isset($user[0])?$user[0]:$user;
        $this->assign('user',$user);
    }


    protected function returnJson($msg='',$status = false,$code=0,$data=array()){
        $this->request;
        $jsonData = array('status'=>$status,'msg'=>$msg,'code'=>$code,'data'=>$data);
        return json($jsonData);
    }

}