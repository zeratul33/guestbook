<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>帖子列表</title>
    <link href="/lovelive/./guestbook//Admin/Tpl/Public/css/tableCSS.css" rel="stylesheet">
</head>
<body>
    <table class="table" style="margin-left: 20%">
        <tr>
            <th>ID</th>
            <th>留言者</th>
            <th>发表内容</th>
            <th>登陆IP</th>
            <th>发言时间</th>
        </tr>
        <?php if(is_array($list)): foreach($list as $key=>$v): ?><tr>
                <td><?php echo ($v["id"]); ?></td>
                <td><?php echo ($v["username"]); ?></td>
                <td><?php echo ($v["content"]); ?></td>
                <td><?php echo ($v["userip"]); ?></td>
                <td><?php echo ($v["time"]); ?></td>
            </tr><?php endforeach; endif; ?>
        <td colspan="5"><?php echo ($page); ?></td>
    </table>
</body>
</html>