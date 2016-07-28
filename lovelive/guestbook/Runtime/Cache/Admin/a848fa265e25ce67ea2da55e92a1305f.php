<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>添加节点</title>
    <link rel="stylesheet" href="/lovelive/./guestbook//Admin/Tpl/Public/css/tableCSS.css">
</head>
<body>
    <form action='<?php echo U("Admin/Rbac/addNodeHandle");?>' method="post">
    <table class="table">
        <tr>
            <th colspan="2">添加<?php echo ($type); ?></th>
        </tr>
        <tr>
            <td><?php echo ($type); ?>名称:</td>
            <td><input type="text" name="name"/></td>
        </tr>
        <tr>
            <td><?php echo ($type); ?>描述:</td>
            <td><input type="text" name="title" /></td>
        </tr>
        <tr>
            <td>是否开启:</td>
            <td><input type="radio" value="1" name="status" checked>开启&nbsp;
            <input type="radio" value="0" name="status">关闭</td>
        </tr>
        <tr>
            <td>排序:</td>
            <td><input type="text" name="sort" value="1"></td>
        </tr>
        <tr>
            <td align="center" colspan="2"><input type="hidden" value="<?php echo ($pid); ?>" name="pid">
                <input type="hidden" value="<?php echo ($level); ?>" name="level">
                <input type="submit">
            </td>
        </tr>
    </table>
    </form>
</body>
</html>