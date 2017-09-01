<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 17.9.1
 * Time: 22:19
 * name:后台角色控制器
 */
namespace Admin\Controller;
use Think\Controller;
use Think\Verify;
class RoleController extends Controller{
    function showlist(){
//        获得角色数据，展示数据
        $info=D('Role')->select();
//        dump($info);exit;
        $this->assign('info',$info);
        $this->display();
    }
}
