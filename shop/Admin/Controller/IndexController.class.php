<?php
/**
 * Created by PhpStorm.
 * User: cyx
 * Date: 2017-08-28
 * Time: 17:07
 */
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller{
    function head(){
        $this->display();
    }
    function left(){
        //用户id
        $admin_id = session('admin_id');
        $admin_name = session('admin_name');
        //根据id获得用户信息
        $admin_info = D('Manager')->find($admin_id);

        //角色id
        $role_id = $admin_info['mg_role_id'];
        //获得角色信息
        $role_info = D('Role')->find($role_id);

        //权限的ids信息
        $auth_ids = $role_info['role_auth_ids'];
        //获得全部权限数据
        //顶级权限、次顶级权限
        if($admin_name === 'admin'){//admin管理员
            $auth_infoA = D('Auth')->where("auth_level=0 ")->select();
            $auth_infoB = D('Auth')->where("auth_level=1 ")->select();
        }else{//普通用户
            $auth_infoA = D('Auth')->where("auth_level=0 and auth_id in ($auth_ids)")->select();
            $auth_infoB = D('Auth')->where("auth_level=1 and auth_id in ($auth_ids)")->select();
        }

        //把获得的权限信息传递给模板显示
        $this -> assign('auth_infoA',$auth_infoA);
        $this -> assign('auth_infoB',$auth_infoB);
        $this -> display();
    }

//    function left(){
////       用户id
//        $admin_id=session('admin_id');
//        $admin_name=session('admin_name');
////       根据id获得用户信息
//        $admin_info=D('Manager')->find($admin_id);
//
////        角色id
//        $role_id=$admin_info['mg_role_id'];
////        获取角色信息
//        $role_info = D('Role')->find($role_id);
//
////        相应权限的ids信息
//        $auth_ids = $role_info['role_auth_ids'];
//
////        获得全部权限数据
////        获得顶级权限
//        if ($admin_name === 'admin'){//admin管理员账户
//            $auth_infoA=D('Auth')->where("auth_level=0")->select();
//            $auth_infoB=D('Auth')->where("auth_level=1")->select();
//        }else {
//            $auth_infoA = D('Auth')->where("auth_level=0 and auth_id in ($auth_ids)")->select();
////        获得次顶级权限
//            $auth_infoB = D('Auth')->where("auth_level=1 and auth_id in ($auth_ids)")->select();
//        }
////dump($auth_infoA);exit;
////        把获得的权限信息传递给模板显示
//        $this->assign('auth_infoA',$auth_infoA);
//        $this->assign('auth_infoB',$auth_infoB);
//        $this->display();
//    }
    function right(){
        $this->display();
    }
    function index(){
//        输出TP框架的常量
//        dump(__MODULE__);
//        dump(__CONTROLLER__);
//        dump(__ACTION__);
        $this->display();
    }

}