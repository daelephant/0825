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
use Think\Verify;

class ManagerController extends Controller{
    function login(){
//        echo "管理员登录系统";
        if (!empty($_POST)){
//            验证验证码
            $vry = new Verify();
//            if($_POST['captcha']==$_SESSION[名称])
            if ($vry->check($_POST['captcha'])){
//                echo "验证码正确";

//                开始验证用户名、密码
//                dump($_POST);exit;
                $userpwd = array(
                    'mg_name'=>$_POST['admin_user'],
                    'mg_pwd' =>$_POST['admin_psd'],
                );
//                对数据操作，对用户名和密码进行校验
//                成功：把用户名和密码所在的记录信息都返回给$info
//                失败:接收到null信息
                $info=D('Manager')->where($userpwd)->find();

                if ($info){
//                    session持久化用户信息(名字、id),页面跳转
                    session('admin_name',$info['mg_name']);
                    session('admin_id',$info['mg_id']);
                    $this->redirect('Index/index');
                }else{
//                    echo "用户名或密码错误";
                    $captcha="用户名或密码错误";
                    $this->assign('captcha',$captcha);
                }

            }else{
                $captcha="验证码错误";
                $this->assign('captcha',$captcha);
            }
        }
        $this->display();
    }
//    生成验证码
    function verifyImg(){
        $cfg=array(
            'imageH'    =>  20,               // 验证码图片高度
            'imageW'    =>  100,               // 验证码图片宽度
            'length'    =>  4,               // 验证码位数
            'fontSize'  =>  10,               // 验证码字体大小
            'fontttf'   =>  '4.ttf',              // 验证码字体，不设置随机获取
        );
//       实例化Vertify类对象
        $very = new \Think\Verify($cfg);
        $very->entry();
    }
//    退出系统
    function logout(){
        //清楚session、跳转到Manager/login
        session(null);
        $this->redirect('Manager/login');
    }
}
