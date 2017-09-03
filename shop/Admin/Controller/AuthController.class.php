<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 17.9.3
 * Time: 7:02
 */
namespace Admin\Controller;
use Tools\AdminController;
class AuthController extends AdminController{
//    列表展示
    function showlist(){
//        获取全部权限信息、展示给模板
        $info = D('Auth')->order('auth_path')->select();
        $this->assign('info',$info);
        $this->display();
    }
//    添加权限
    function tianjia(){
        $auth = new \Model\AuthModel();
//    两个逻辑：展示，收集
        if(!empty($_POST)){
//            全路径和等级两个字段需要二期制作
            $z=$auth->saveData($_POST);
            if($z){
                $this->redirect('showlist',array(),2,'添加数据成功');
            }else{
                $this->redirect('tianjia',array('role_id'=>$role_id),2,'添加权限失败');
            }
        }else{
//            获得用于选择的顶级权限
            $auth_infoA = $auth->where('auth_level=0')->select();

            $this->assign('auth_infoA',$auth_infoA);
            $this->display();
        }
    }
}