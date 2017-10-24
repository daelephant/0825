<?php
return array(
	//'配置项'=>'配置值'
    'SHOW_PAGE_TRACE'=>true,

    //设置请求的默认分组
    'DEFAULT_MODULE' => 'Home',//和下面的列表对比。相当于分组只有Home和Admin，其他的都默认为控制器
    'MODULE_ALLOW_LIST' => array('Home','Admin'),//设置一个对比的分组列表

    /* 数据库设置 */
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  'localhost', // 服务器地址
    'DB_NAME'               =>  'shop0825',          // 数据库名
    'DB_USER'               =>  'elephant',      // 用户名
    'DB_PWD'                =>  'hello2017',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'sw_',    // 数据库表前缀
    'DB_PARAMS'          	=>  array(), // 数据库连接参数
    'DB_DEBUG'  			=>  TRUE, // 数据库调试模式 开启后可以记录SQL日志
    'DB_FIELDS_CACHE'       =>  true,        // 启用字段缓存
    'DB_CHARSET'            =>  'utf8',      // 数据库编码默认采用utf8
    //tp项目路由层面的伪静态
    // 开启路由
    'URL_ROUTER_ON'   => true,
    //定义路由规则
    'URL_ROUTE_RULES'=>array(
        'news/:year/:month/:day' => array('News/archive', 'status=1'),
        //http://网址/index.php/分组/news/2017/10/24
        //真实地址：http://网址/index.php/分组/News/archive/status/1/year/2017/month/10/day/24
        'news/:id'               => 'News/read',
        'news/read/:id'          => '/news/:1',
//        http://www.0825.com/shop/Home/login/2017/10
//    真实地址：http://www.0825.com/shop/Home/user/login并且有三个get参数
        'login/:year/:month'          => array('User/login', 'status=1')

        ),
);