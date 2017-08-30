<?php

//命名空间 php5.3以后版本支持
namespace Model;
use Think\Model;

//User模型model类
//父类：ThinkPHP/Library/Think/Model.class.php
class UserModel extends Model{
    //设置验证规则
    // 是否批处理验证
    protected $patchValidate    =   true;
    // 自动验证定义
    protected $_validate = array(
        //为表单域定义具体验证规则
        //① 验证用户名，非空
        //array(字段名称 表单域name属性值，验证规则，错误提示[，验证条件，附加规则，验证时间])
        array('username','require','用户名不能为空'),
        array('username','','用户名已经被占用',0,'unique'),
        //② 密码，非空
        array('password','require','密码不能为空'),
        //③ 确认密码，非空/与密码保持一致
        array('password2','require','确认密码不能为空'),
        array('password2','password','与密码保持一致',0,'confirm'),
        //④ 邮箱验证,符合邮箱格式
        array('user_email','email','邮箱格式不正确',2),
        //⑤ qq号码，纯数字，位数为5-12位
        array('user_qq','number','qq号码为数字信息'),
        array('user_qq','5,12','qq号码长度为5-12位',0,'length'),
        //⑥ 学历，必须选择一个
        array('user_xueli','2,3,4,5','学历必须选择一个',0,'in'),
        //⑦ 爱好，至少选择两个或以上
        //         通过当前模型类的一个方法进行验证
        array('user_hobby','check_hobby','爱好至少选择两个或以上',1,'callback'),
    );
    //$arg参数 代表被收集到的表单域信息
    function check_hobby($arg){
        if(count($arg)<2){
            return false;
        }
        return true;
    }
}
