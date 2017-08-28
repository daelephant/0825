<?php
/**
 * Created by PhpStorm.
 * User: cyx
 * Date: 2017-08-28
 * Time: 16:46
 */
//后台管理员控制器
namespace Admin\Controller;
use Think\Controller;
class ManagerController extends Controller{
    function login(){
//        echo "管理员登录系统";
        $this->display();
    }
}
