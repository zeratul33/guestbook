<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>删除列表</title>
    <link href="/lovelive/./guestbook//Admin/Tpl/Public/css/tableCSS.css" rel="stylesheet">
</head>
<body>
    <table class="table">
        <tr>
            <th>ID</th>
            <th>留言者</th>
            <th>发表内容</th>
            <th>发表时间</th>
            <th>登陆IP</th>
            <th>删除时间</th>
            <th>操作者Id</th>
        </tr>
        <?php if(is_array($del)): foreach($del as $key=>$v): ?><tr>
                <td><?php echo ($v["id"]); ?></td>
                <td><?php echo ($v["username"]); ?></td>
                <td><?php echo ($v["content"]); ?></td>
                <td><?php echo ($v["time"]); ?></td>
                <td><?php echo ($v["userip"]); ?></td>
                <td><?php echo ($v["deltime"]); ?></td>
                <td><?php echo ($v["controlleruid"]); ?></td>
            </tr><?php endforeach; endif; ?>

            <td colspan="7"><?php echo ($page); ?></td>

    </table>
</body>
</html>