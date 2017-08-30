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
                echo "验证码正确";
            }else{
                echo "验证码错误";
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
}
