<?php
/**
 * Created by PhpStorm.
 * User: cyx
 * Date: 2017-08-28
 * Time: 17:40
 */
namespace Admin\Controller;
use Model\GoodsModel;
use Tools\AdminController;
use Think\Model;

class GoodsController extends AdminController{
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

//        实现数据分页效果
//        1、获得总条数、每页显示条数设置
        $cnt = $goods->count();//获得总条数  sum() max() avg() min()
//        拼接SQL语句：SELECT COUNT(*) AS tp_count FROM sw_goods LIMIT 1
        $per = 7;
//        2、实例化分页类对象
        $page_obj = new \Tools\Page($cnt,$per);
//        3、制作一条SQL语句，获得每页显示的数据
//        $page_obj->limit:分页工具类会根据当前页码把  limit偏移量，长度  给拼装好并赋值给limit成员属性
        $sql = "select * from sw_goods ORDER BY goods_id DESC ".$page_obj->limit;
        $info = $goods->query($sql);
//        制作页码列表
        $pagelist = $page_obj->fpage(array(3,4,5,6,7,8));//对应父类的fpage方法的八种成员属性，自行设置

        $this->assign('pagelist',$pagelist);
        $this->assign('info',$info);

        $this->display();
    }

    public function tianjia()
    {
//        dump($_FILES);exit;
        $goods = new \Model\GoodsModel();
        if(!empty($_POST)){
//            商品图片处理
            if($_FILES['goods_pic']['error']===0){
                $cfg=array(
                    'rootPath' => './Public/Upload/',//对父类重置保存路径属性
                );
//                设置附件的存储路径
                $up = new \Think\Upload($cfg);
//                上传附件
//                如果附件上传成功，可以通过uploadOne的返回值查看到附件信息
//                在服务器存储情况
                $info = $up->uploadOne($_FILES['goods_pic']);
                $bigpicname = $up->rootPath.$info['savepath'].$info['savename'];//./Public/Upload/2017-08-31/59a77d81b6e55.png
                $_POST['goods_big_img'] = substr($bigpicname,2);//去除./

//                给上传好的图片制作缩略图
//               1、 实例化对象
                $im = new \Think\Image();
//               2、打开源图片（需要制作缩略图的图片）
                $im->open($bigpicname);
//               3、为源图片制作缩略图
                $im->thumb(125,125);//等比例缩放
//               4、把制作好的图保存到服务器上
//                缩略图和原图在同一个目录位置
//                原图：59a77d81b6e55.png  缩略图：small_59a77d81b6e55.png
                $smallpicname = $up->rootPath.$info['savepath']."small_".$info['savename'];
                $im->save($smallpicname);
//               5、把缩略图的路径保存到数据库中
                $_POST['goods_small_img'] = substr($smallpicname,2);//去除./
            }
//            dump($_POST);exit;
//            收集表单信息
            if ($goods->create()) {
                $data=$goods->create();
                $info = $goods->add($data);
            }
            if ($info){
                $this->makehtml($info);
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
//给商品生成静态页面
    private function makehtml($goods_id){
//                 把添加好的商品顺便给生成一个静态页面
//                前台查看商品详情页面就直接查看该静态页面即可
        ob_start();
        //内容输出前台商品详情的模板页面(Home/view/Goods/detail.html)
        $information = D('Goods')->find($goods_id);
        $this->assign('vo',$information);
        $this->display('Home@Goods/detail');
        $cont = ob_get_contents();
//                把$cont的内容制作成一个静态文件 ./product/goods_190.html
        file_put_contents('./product/goods_'.$goods_id.'.html',$cont);
        ob_end_clean();//关闭、清空php缓冲区
    }
    public function upd($goods_id)//upd每次请求的时候要传递goods_id参数，如果没有，禁止访问
    {
          $goods = new \Model\GoodsModel();
//          dump($_POST);
        if (!empty($_POST)){
            $info = $goods->save($_POST);
            if ($info){
                $this->makehtml($goods_id);
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