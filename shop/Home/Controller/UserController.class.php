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
          $user = new \Model\UserModel();
//          两个逻辑：展示，收集
//        $user = D('User');
//        dump($_POST);

        if(!empty($_POST)){
              $data = $user->create();//收集信息，表单自动验证
//              dump($data);exit;
              if ($data){
                  //验证成功，就会通过$data提现收集到的表单数据
                  //          把爱好的数组变为字符串
                  $data['user_hobby']= implode(',',$data['user_hobby']);
                  $info = $user->add($data);
                  if ($info){
                      $this->redirect('Index/index');
                  }
              }else{
                  //验证失败,返回getError()数据
                  $this->assign('errorInfo',$user->getError());
              }
////          把爱好的数组变为字符串
//            $_POST['user_hobby']= implode(',',$_POST['user_hobby']);
////            var_dump($_POST['user_hobby']);exit;
//            $info = $user->add($_POST);
//            echo $info;
//            简单的表单验证

        }

        $this->display();//展示，一进来就要展示

    }
}