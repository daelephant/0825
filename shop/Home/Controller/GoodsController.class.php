<?php
namespace Home\Controller;
use Think\Controller;
class GoodsController extends Controller {
    function showlist(){
        //设置memcache缓存
        $this->display();
    }
}