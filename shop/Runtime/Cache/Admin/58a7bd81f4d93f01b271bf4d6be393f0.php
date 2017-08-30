<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>添加商品</title>
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
        <link href="./css/mine.css" type="text/css" rel="stylesheet">
    </head>

    <body>

        <div class="div_head">
            <span>
                <span style="float:left">当前位置是：商品管理-》添加商品信息</span>
                <span style="float:right;margin-right: 8px;font-weight: bold">
                    <a style="text-decoration: none" href="/shop/index.php/Admin/Goods\showlist">【返回】</a>
                </span>
            </span>
        </div>
        <div></div>

        <div style="font-size: 13px;margin: 10px 5px">
            <!--三种动态路径的写法-->
            <!--绝对路径-->
            <form action="\shop\index.php\Admin\Goods\tianjia" method="post" enctype="multipart/form-data">
            <!--控制器相对路径-->
            <!--<form action="/shop/index.php/Admin/Goods\tianjia" method="post" enctype="multipart/form-data">-->
            <!--模板相对路径-->
            <!--<form action="/shop/index.php/Admin/Goods/tianjia" method="post" enctype="multipart/form-data">-->
            <table border="" width="100%" class="table_a">
                <tr>
                    <td>商品名称</td>
                    <td><input type="text" name="goods_name" /><span style="color: #9B410E"><?php echo ($errorInfo["goods_name"]); ?></span></td>

                </tr>
                <!--<tr>-->
                    <!--<td>商品分类</td>-->
                    <!--<td>-->
                        <!--<select name="goods_category_id">-->
                            <!--<option value="0">请选择</option>-->
                            <!--{foreach from=$s_category_info key=_k item=_v}-->
                            <!--<option value="<?php echo ($_v["category_id"]); ?>"><?php echo ($_v["category_name"]); ?></option>-->
                            <!--{/foreach}-->
                        <!--</select>-->
                    <!--</td>-->
                <!--</tr>-->
                <!--<tr>-->
                    <!--<td>商品品牌</td>-->
                    <!--<td>-->
                        <!--<select name="goods_brand_id">-->
                            <!--<option value="0">请选择</option>-->
                            <!--{foreach from=$s_brand_info key=_k item=_v}-->
                            <!--<option value="<?php echo ($_v["brand_id"]); ?>"><?php echo ($_v["brand_name"]); ?></option>-->
                            <!--{/foreach}-->
                        <!--</select>-->
                    <!--</td>-->
                <!--</tr>-->
                <tr>
                    <td>商品价格</td>
                    <td><input type="text" name="goods_price" /><span style="color: #9B410E"><?php echo ($errorInfo["goods_price"]); ?></span></td>
                </tr>
                <tr>
                    <td>商品数量</td>
                    <td><input type="text" name="goods_number" /><span style="color: #9B410E"><?php echo ($errorInfo["goods_number"]); ?></span></td>
                </tr>
                <tr>
                    <td>商品重量</td>
                    <td><input type="text" name="goods_weight" /><span style="color: #9B410E"><?php echo ($errorInfo["goods_weight"]); ?></span></td>
                </tr>
                <tr>
                    <td>商品照片</td>
                    <td><input type="file" name="goods_pic" /></td>
                </tr>
                <tr>
                    <td>商品详细描述</td>
                    <td>
                        <textarea name="goods_introduce"></textarea>
                    </td>
                </tr>
                
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" value="添加">
                    </td>
                </tr>  
            </table>
            </form>
        </div>
    </body>
</html>