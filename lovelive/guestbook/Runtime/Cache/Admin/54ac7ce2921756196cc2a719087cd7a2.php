<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>添加角色</title>
    <link rel="stylesheet" href="/lovelive/./guestbook//Admin/Tpl/Public/css/tableCSS.css">
</head>
<body>
    <form action='<?php echo U("Admin/Rbac/addRoleHandle");?>' method="post">
    <table class="table">
        <tr>
            <th colspan="2">添加角色</th>
        </tr>
        <tr>
            <td>角色名称：</td>
            <td>
                <input type="text" name="name">
            </td>
        </tr>
        <tr>
            <td>角色描述:</td>
            <td>
                <input type="text" name="remark">
            </td>
        </tr>
        <tr>
            <td>是否开启:</td>
            <td>
                <input type="radio" name="status" value="1" checked>开启&nbsp;
                <input type="radio" name="status" value="0">关闭
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit">
            </td>
        </tr>
    </table>

    </form>
</body>
</html>