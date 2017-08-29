<?php
/**
 * Created by PhpStorm.
 * User: cyx
 * Date: 2017-08-29
 * Time: 11:44
 */
namespace Model;
use Think\Model;
class EnglishModel extends Model{
    //自定义当前Model操作的真实数据表名
    //实际数据表名（包含表前缀）
    protected $trueTableName = 'english';
}