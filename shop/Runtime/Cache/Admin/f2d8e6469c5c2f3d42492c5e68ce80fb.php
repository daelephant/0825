<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>分配权限</title>
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
        <link href="<?php echo ADMIN_CSS_URL;?>mine.css" type="text/css" rel="stylesheet">
    </head>

    <body>

        <div class="div_head">
            <span>
                <span style="float:left">当前位置是：角色管理-》分配权限【<?php echo ($role_info["role_name"]); ?>】</span>
                <span style="float:right;margin-right: 8px;font-weight: bold">
                    <a style="text-decoration: none" href="/shop/index.php/Admin/Role/showlist">【返回】</a>
                </span>
            </span>
        </div>
        <div></div>
        <div style="font-size: 13px;margin: 10px 5px">
<form action="/shop/index.php/Admin/Role/distribute/role_id/100" method="post" >
<table border="1" width="100%" class="table_a">
    <!--{foreach $auth_infoA as $k => $v}-->
    <?php if(is_array($auth_infoA )): foreach($auth_infoA as $key=>$v): ?><tr>
        <td width='18%'>
<!--判断是否已经拥有该权限-->
            <?php if(in_array($v['auth_id'],$have_auth)): ?><input type="checkbox" name="auth_id[]" value="<?php echo ($v["auth_id"]); ?>" checked="checked" />
            <?php else: ?>
            <input type="checkbox" name="auth_id[]" value="<?php echo ($v["auth_id"]); ?>" /><?php endif; ?>
            <?php echo ($v["auth_name"]); ?></td>
        <td>
            <!--{foreach $auth_infoB as $kk => $vv}-->
            <?php if(is_array($auth_infoB)): foreach($auth_infoB as $key=>$vv): ?><!--{if $vv.auth_pid==$v.auth_id}-->
                <?php if($vv[auth_pid] == $v[auth_id]): ?><div style='width:200px;float:left;'>
                <?php if(in_array($vv['auth_id'],$have_auth)): ?><input type="checkbox" name="auth_id[]" value="<?php echo ($vv["auth_id"]); ?>" checked="checked" />
                <?php else: ?>
                <input type="checkbox" name="auth_id[]" value="<?php echo ($vv["auth_id"]); ?>" /><?php endif; ?>
                <?php echo ($vv["auth_name"]); ?></div><?php endif; endforeach; endif; ?>
        </td>
    </tr><?php endforeach; endif; ?>
</table>
<input type="submit" value="分配权限" />
</form>
        </div>
    </body>
</html>