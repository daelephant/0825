<?php
/**
 * Created by PhpStorm.
 * User: cyx
 * Date: 2017-08-28
 * Time: 17:40
 */
namespace Admin\Controller;
use Think\Controller;
class GoodsController extends Controller{
    function showlist(){
        $this->display();
    }

    public function tianjia()
    {
        $this->showlist();
    }

    public function upd()
    {
        $this->showlist();
    }
}