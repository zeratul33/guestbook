<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>角色列表</title>
    <link href="/lovelive/./guestbook//Admin/Tpl/Public/css/tableCSS.css" rel="stylesheet">
</head>
<body>
    <table class="table">
        <tr>
            <th>ID</th>
            <th>角色名</th>
            <th>描述</th>
            <th>操作</th>
        </tr>
        <?php if(is_array($role)): foreach($role as $key=>$v): ?><tr>
                <td><?php echo ($v["id"]); ?></td>
                <td><?php echo ($v["name"]); ?></td>
                <td><?php echo ($v["remark"]); ?></td>
                <td><a href='<?php echo U("Admin/Rbac/access",array("rid"=>$v["id"]));?>'>配置权限</a> </td>
            </tr><?php endforeach; endif; ?>
    </table>
</body>
</html>