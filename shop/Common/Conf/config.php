<?php
return array(
	//'配置项'=>'配置值'
    'SHOW_PAGE_TRACE'=>true,

    //设置请求的默认分组
    'DEFAULT_MODULE' => 'Home',//和下面的列表对比。相当于分组只有Home和Admin，其他的都默认为控制器
    'MODULE_ALLOW_LIST' => array('Home','Admin'),//设置一个对比的分组列表
);