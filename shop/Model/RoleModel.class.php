<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 17.9.2
 * Time: 14:24
 * name: Role模型model类
 */
namespace Model;
use Think\Model;
class RoleModel extends Model{
//    分配权限，收集信息，二期制作，存储信息
    function saveAuth($role_id,$authids){
//        数组的authid变为 字符串的authid
        $authid_str = implode(',',$authids);
//        根据字符串的authid信息，查询出对应的“控制器-操作方法”
        $authinfo=D('Auth')->select($authid_str);
//        dump($authinfo);
        $s="";//声明一个空字符串
        foreach($authinfo as $k => $v){
            if(!empty($v['auth_c']) && !empty($v['auth_a'])){
                $s.=$v['auth_c']."-".$v['auth_a'].",";
            }
        }
        $s=rtrim($s,',');
        $sql = "update sw_role set role_auth_ids='$authid_str',role_auth_ac='$s'
                where role_id='$role_id'";
        return $this->execute($sql);
    }
}