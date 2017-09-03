<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 17.9.1
 * Time: 22:19
 * name:后台角色控制器
 */
namespace Admin\Controller;
use Tools\AdminController;
use Think\Verify;
class RoleController extends AdminController{
    function showlist(){
//        获得角色数据，展示数据
        $info=D('Role')->select();
//        dump($info);exit;
        $this->assign('info',$info);
        $this->display();
    }
//    分配权限
    function distribute($role_id){
        $role = new \Model\RoleModel();
        if(!empty($_POST)){
//            $_POST数据需要二期制作才可以写入数据库
//            在自定义RoleModel里面制作一个方法saveAuth，去实现数据制作和存储
            $z = $role->saveAuth($role_id,$_POST['auth_id']);
            if($z){
                $this->redirect('showlist',array(),2,'权限分配成功！');
            }else{
                $this->redirect('distribute',array('role_id'=>$role_id),2,'分配权限失败');
            }
        }else {
//        查询被分配权限的角色信息
            $role_info = D('Role')->find($role_id);
//         查询角色已经拥有的权限信息
            $have_auth = explode(',',$role_info['role_auth_ids']);//变为数组
//        获得全部用于分配的权限并展示到模板
//        分为顶级权限和次顶级权限
            $auth_infoA = D('Auth')->where('auth_level=0')->select();
            $auth_infoB = D('Auth')->where('auth_level=1')->select();

            $this->assign('auth_infoA', $auth_infoA);
            $this->assign('auth_infoB', $auth_infoB);
            $this->assign('role_info', $role_info);
            $this->assign('have_auth', $have_auth);
            $this->display();
        }
    }
}
