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
        //对goods的model进行操作
        //实例化model对象
//        $goods=new \Model\GoodsModel();
//        $goods=new \Model\EnglishModel();
//        dump($goods);
//        $obj = D('User');//实例化父类Model并且传参确定表名
//        dump($obj);
        //实例化Model对象，查询数据，展示数据

        $goods = new \Model\GoodsModel();
        //1、select * from sw_goods;
//        $info = $goods->select();//select是父类Model的方法
        //数据传递给模板，此assign是父类Controller的assign
//        2、根据主键值id，查询一条记录信息
//        $info = $goods->select(9);
//        3、查询主键id值在某个列表之中
//        $info=$goods->select('20,9,17,15');
//        各种查询：
//        1、where（）条件限制
//        $info=$goods->where('goods_price >1000 and goods_name like "诺%"')->select();

//        2、limit([偏移量，]长度)记录数目限制
//        $info=$goods->limit(5)->select();

//        3、field()限制查询字段
//        $info = $goods->field('goods_id,goods_name')->select();

//        4、order()排序查询
//        $info = $goods->order('goods_price desc')->select();

//        5、group()分组查询select goods_brand_id,count(*) from sw_goods group by goods_brand_id;
//        $info=$goods->group('goods_brand_id')->field('goods_brand_id,count(*)')->select();

//        6、having()设置条件
//        $info = $goods->having('goods_price>2000')->select();

//        having和where都可以设置条件查询，两种在某些场合可以通用
//        其中：where：条件查询字段必须是“数据表”存在的字段
//        其中：having：条件字段必须是“结果集”中存在的字段
//        举例区别：
//        1、通用情况：
//        $info = $goods->query('select * from sw_goods WHERE goods_price > 2000;');
//        $info = $goods->query('select * from sw_goods HAVING goods_price > 2000;');
//        2、只能用where
        $this->assign('info',$info);

        $this->display();
    }

    public function tianjia()
    {
        $this->display();
    }

    public function upd()
    {
        $this->display();
    }
}