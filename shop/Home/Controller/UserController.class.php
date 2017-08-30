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
        $user = D('User');
//        dump($_POST);
        if(!empty($_POST)){
//            把爱好的数组变为字符串
            $_POST['user_hobby']= implode(',',$_POST['user_hobby']);
//            var_dump($_POST['user_hobby']);exit;
            $info = $user->add($_POST);
            echo $info;
        }else {
            $this->display();
        }
    }
}