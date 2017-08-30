<?php
/**
 * Created by PhpStorm.
 * User: cyx
 * Date: 2017-08-28
 * Time: 17:40
 */
namespace Admin\Controller;
use Model\GoodsModel;
use Think\Controller;
use Think\Model;

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

        $goods = new \Model\GoodsModel();//建议用这种方式实例化对象
//        $goods = D(Goods);//实例化父类
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
//
//        3、field()限制查询字段
//        $info = $goods->field('goods_id,goods_name')->select();
//
//        4、order()排序查询
//        $info = $goods->order('goods_price desc')->select();
//
//        5、group()分组查询select goods_brand_id,count(*) from sw_goods group by goods_brand_id;
//        $info=$goods->group('goods_brand_id')->field('goods_brand_id,count(*)')->select();
//
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
//        $info = $goods->query('select goods_id,goods_name from sw_goods WHERE goods_price>2000;');
//        使用having会报错：SQLSTATE[42S22]: Column not found: 1054 Unknown column 'goods_price' in 'having clause'
//        3、只能用having:查询一条总数量大于3的商品信息：
//        $info = $goods->query('select goods_brand_id,count(*) as cnt from sw_goods HAVING cnt > 3;');
//        使用where会报错：SQLSTATE[42S22]: Column not found: 1054 Unknown column 'cnt' in 'where clause'
        $info = $goods->select();
        $this->assign('info',$info);

        $this->display();
    }

    public function tianjia()
    {
        $goods = new \Model\GoodsModel();
        if(!empty($_POST)){
            if ($goods->create()) {
                $data=$goods->create();
                $info = $goods->add($data);
            }
            if ($info){
//                $this->redirect(地址分组\控制器\方法，参数，时间间隔，提示信息);
                $this->redirect('showlist',array(),2,'添加成功');
            }else{
                $this->assign('errorInfo',$goods->getError());
//                $this->redirect('tianjia',array(),2,'添加失败');
            }
        }
        $this->display();//展示表单

//        var_dump($_POST);
//        1、数组方式添加数据：
//
//        $arr = array(
//          'goods_name' => '黑莓手机',
//          'goods_price' => 3600,
//          'goods_number' => 15,
//          'goods_weight' => 104,
//        );
//        $info = $goods->add($arr);
//        dump($info);//返回主键id
//        $this->display();

//        以AR方式添加数据
//        $goods->goods_name="小米";
//        $goods->goods_price="1499";
//        $goods->goods_weight="109";
//        $info=$goods->add();
//        echo $info;//同样返回自增id


    }

    public function upd($goods_id)//upd每次请求的时候要传递goods_id参数，如果没有，禁止访问
    {
          $goods = new \Model\GoodsModel();
//          dump($_POST);
        if (!empty($_POST)){
            $info = $goods->save($_POST);
            if ($info){
                $this->redirect('showlist',array('title'=>'success'),2,'修改成功!');
            }else{
                $this->redirect('upd',array('goods_id'=>$goods_id),2,'修改失败!');
            }
        }else{
            $info = $goods->find($goods_id);
            $this->assign('info',$info);
            $this->display();
        }

//          dump($info);
//        dump($goods_id);
//        调用方法：model对象->save();数组和AR模式类似add
//        $goods = new \Model\GoodsModel();
//        $goods->goods_name = "坚果";
//        $goods->goods_price = "3600";
//        $goods->goods_weight= 115;
//
//        $info = $goods->where('goods_id=165')->save();//许设置where条件
//        //mysql数据库本身可以一次性修改全部记录，但是TP框架不允许一次修改全部记录，否则报错bool(false)
////      成功返回受影响条数int(1),相同的数据重复多次，返回0，因为对数据库看无影响
//        dump($info);
//        $this->assign('info',$info);
//        $this->display();
    }
    public function delete($goods_id){
        $goods = new \Model\GoodsModel();
        $info = $goods->delete($goods_id);
        dump($info);
    }
}