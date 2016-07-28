<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>用户列表</title>
    <link rel="stylesheet" href="/lovelive/./guestbook//Admin/Tpl/Public/css/tableCSS.css">
    <style>
        tr a {display: block;text-decoration: none;border-radius: 4px;color: #fff0fb;background-color: #a200c9}
    </style>
</head>
<body>
    <table class="table">
        <tr>
            <th>ID</th>
            <th>用户</th>
            <th>登陆IP</th>
            <th>登录时间</th>
            <th>状态</th>
            <th>操作</th>
        </tr>

            <?php if(is_array($result)): foreach($result as $key=>$v): ?><tr>
                <td><?php echo ($v["id"]); ?></td>
                <td><?php echo ($v["username"]); ?></td>
                <td><?php echo ($v["loginip"]); ?></td>
                <td><?php echo ($v["logintime"]); ?></td>
                <td><?php echo ($v["lock"]); ?></td>
                <td><?php if($v['lock']==0): ?><a href='<?php echo U("Admin/Rbac/lockoff",array("id"=>$v["id"]));?>'>锁定</a>
                    <?php else: ?>
                        <a href='<?php echo U("Admin/Rbac/lockon",array("id"=>$v["id"]));?>'>开启</a><?php endif; ?>
                </td>
                </tr><?php endforeach; endif; ?>

    </table>
</body>
</html>