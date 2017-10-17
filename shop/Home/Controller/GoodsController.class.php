<?php
namespace Home\Controller;
use Think\Controller;
class GoodsController extends Controller {
    function showlist(){
//        连接到memcache服务器
        S(array('type'=>'memcache','host'=>'127.0.0.1','port'=>11211));
//        首先到memcache里面获取缓存信息
        $info = S('goods_info_mem');
//        判断$info是否存在
//
        if(empty($info)){
            echo '从数据库中请求数据';
//            从数据库中获得数据
            $info = D('Goods')->select();
//            把获得的数据设置到memcache中去
            S('goods_info_mem',$info);
        }
        $this->assign('info',$info);
        $this->display();
    }
}