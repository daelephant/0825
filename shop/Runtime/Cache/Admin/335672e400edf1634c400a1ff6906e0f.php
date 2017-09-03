<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />

        <title>会员列表</title>

        <link href="/Application/Admin/Public/css/mine.css" type="text/css" rel="stylesheet" />
    </head>
    <body>
        <style>
            .tr_color{background-color: #9F88FF}
        </style>
        <div class="div_head">
            <span>
                <span style="float: left;">当前位置是：权限管理-》权限列表</span>
                <span style="float: right; margin-right: 8px; font-weight: bold;">
                    <a style="text-decoration: none;" href="/shop/index.php/Admin/Auth/tianjia">【添加权限】</a>
                </span>
            </span>
        </div>
        <div></div>
        <div style="font-size: 13px; margin: 10px 5px;">
            <table class="table_a" border="1" width="100%">
                <tbody><tr style="font-weight: bold;">
                        <td>序号</td>
                        <td>权限名称</td>
                        <td>父ID</td>
                        <td>控制器名</td>
                        <td>方法名</td>
                        <td>全路径</td>
                        <td>权限等级</td>
                        <td>修改</td>
                    </tr>
                    <?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr id="product1">
                        <td><?php echo ($vo[auth_id]); ?></td>
                        <td><?php echo str_repeat('--/',$vo[auth_level]); echo ($vo[auth_name]); ?></td>
                        <td><?php echo ($vo[auth_pid]); ?></td>
                        <td><?php echo ($vo[auth_c]); ?></td>
                        <td><?php echo ($vo[auth_a]); ?></td>
                        <td><?php echo ($vo[auth_path]); ?></td>
                        <td><?php echo ($vo[auth_level]); ?></td>

                        <td><a href="/shop/index.php/Admin/Auth/updateAuth/auth_id/<?php echo ($vo['auth_id']); ?>">修改</a></td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    <tr>
                        <td colspan="24" style="text-align: center;">
                            <?php echo ($pagestr); ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </body>
</html>