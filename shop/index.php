<?php
header("content-type:text/html;charset=utf-8");
define('APP_DEBUG',true);//设置debug模式一定要放在加载项目之前


//给系统静态资源文件请求路径设置常量
define('CSS_URL','/shop/Home/Public/css/');
define('IMG_URL','/shop/Home/Public/images/');
define('JS_URL','/shop/Home/Public/js/');


//引入tp框架接口文件
include ("../ThinkPHP/ThinkPHP.php");
//ceshi
