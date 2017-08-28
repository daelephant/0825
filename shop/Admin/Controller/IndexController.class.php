<?php
/**
 * Created by PhpStorm.
 * User: cyx
 * Date: 2017-08-28
 * Time: 17:07
 */
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller{
    function head(){
        $this->display();
    }
    function left(){
        $this->display();
    }
    function right(){
        $this->display();
    }
    function index(){
//        输出TP框架的常量
//        dump(__MODULE__);
//        dump(__CONTROLLER__);
//        dump(__ACTION__);
        $this->display();
    }

}