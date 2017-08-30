<?php
/**
 * Created by PhpStorm.
 * User: cyx
 * Date: 2017-08-29
 * Time: 11:12
 */
namespace Model;
use Think\Model;
//Goods模型Model类
//父类：ThinkPHP/Library/Think/Model.class.php
//以下goods的model类是一个空类，不影响对数据库的操作，因为TP框架已经把许多简单的操作封装给Model了
class GoodsModel extends Model{
    //设置验证规则
    // 是否批处理验证
    protected $patchValidate    =   true;
    // 自动验证定义
    protected $_validate = array(
        //为表单域定义具体验证规则
        //① 验证用户名，非空
        //array(字段名称 表单域name属性值，验证规则，错误提示[，验证条件，附加规则，验证时间])
        array('goods_name','require','商品名不能为空'),
//        array('goods_name','','用户名已经被占用',0,'unique'),
        //⑤ 价格，纯数字，位数为5-12位
//        array('goods_price','require','价格不能为空'),
        array('goods_price','number','价格为数字信息'),
//        array('goods_price','1,5','价格数为1-5位',0,'length'),//注意是数字的位数，不是数字大小大小用between
        array('goods_price','1,10000','价格数为1-1万元',0,'between'),

    );
    //$arg参数 代表被收集到的表单域信息
}