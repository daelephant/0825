<?php
/**
 * Created by PhpStorm.
 * User: cyx
 * Date: 2017-08-28
 * Time: 11:17
 */
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller{
    //登录系统
    function login(){
//        echo "登录";
          $this->display();
    }
    //注册系统
    function register(){
//        echo "注册";
        $this->display();
    }
}