<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 17.9.3
 * Time: 10:37
 * name：后台普通控制器的父类
 */
namespace Tools;
use Think\Controller;

class AdminController extends Controller{
//    构造方法
    function __construct()
    {
//        为了避免覆盖父类的构造方法，先执行父类的构造方法
        parent::__construct();


//        用户访问权限控制
//        获得当前正在访问的“控制器-操作方法 nowac”
//        判断nowac是否在用户的角色权限列表里面存在

//        1.当前请求的  控制器-操作方法
        $nowac = CONTROLLER_NAME."-".ACTION_NAME;

//        判断是否登录
        $admin_name = session('admin_name');
//        用户没有登录系统，就使其退出并进入到登录界面
//        有一些操作，允许在““退出状态也可以访问，比如登录页
        $rang_ac = "Manager-login,Manager-verifyImg";
//        1.用户不在登录状态
//        2.用户的操作  还没有在$rang_ac出现
        if(empty($admin_name) && strpos($rang_ac,$nowac)===false){
//            $this->redirect('Manager/login');
            $js = <<<eof
                <script type="text/javascript">
                  window.top.location.href="/shop/index.php/Admin/Manager/login"
                </script>
eof;
            echo $js;
        }
//        2.获得当前用户对应角色的权限列表信息
//        用户----组别----权限
//        用户信息
        $admin_name = session('admin_name');
        $admin_id   = session('admin-id');
        $admin_info = D('Manager')->find($admin_id);
//        角色信息
        $role_id    = $admin_info['mg_role_id'];
        $role_info  = D('Role')->find($role_id);
//       角色拥有的权限信息
        $auth_ac    = $role_info['role_auth_ac'];

//        设置默认允许访问权限
        $allowac = "Manager-login,Manager-logout,Manager-verifyImg,Index-left
        ,Index-right,Index-head,Index-index";

//        判断：$nowac 是否在存在$auth_ac里
//        strpos('大字符串'，'小字符串')；
//        在一个大字符串中判断一个小的字符串从左边开始第一次出现的位置

//        1.当前访问权限没有在“角色对应的权限列表”
//        2.当前访问权限也没有在“默认允许列表”里面
//        3.当前权限用户还不能是超级管理员Admin
        if(strpos($auth_ac,$nowac)===false && strpos($allowac,$nowac)===false &&
            $admin_name!=='admin'){
            exit('没有访问权限');

        }



    }
}
