<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
    <form name="form1" method="post" action="/shop/index.php/Admin/Auth/tianjia">
      <table width="500" border="1" align="center">
        <tr>
          <th colspan="2">添加权限</th>
        </tr>
        <tr>
          <td>权限名称：</td>
          <td><input name="auth_name" type="text" id="auth_name" ></td>
        </tr>
        <tr>
          <td>选中父级：</td>
          <td><select name="auth_pid" id="auth_pid">
          <option value="0">---请选择父级---</option>
          <!--<option></option>-->
          <?php if(is_array($auth_infoA)): $i = 0; $__LIST__ = $auth_infoA;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["auth_id"]); ?>"><?php echo ($vo["auth_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
          </select></td>
        </tr>
        <tr>
          <td>控制器名称：</td>
          <td><input name="auth_c" type="text" id="auth_c" ></td>
        </tr>
        <tr>
          <td>方法名称：</td>
          <td><input name="auth_a" type="text" id="auth_a" ></td>
        </tr>
        <tr>
          <td colspan="2" align="center"><input type="submit" id="button" value="提交"></td>
        </tr>
      </table>
    </form>
    </body>
</html>