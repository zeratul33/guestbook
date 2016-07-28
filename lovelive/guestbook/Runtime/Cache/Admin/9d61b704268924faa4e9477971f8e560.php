<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>举报列表</title>
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
            <th>举报时间</th>
            <th>操作</th>
        </tr>
        <?php if(is_array($del)): foreach($del as $key=>$v): ?><td><?php echo ($v["id"]); ?></td>
            <td><?php echo ($v["username"]); ?></td>
            <td><?php echo ($v["content"]); ?></td>
            <td><?php echo ($v["time"]); ?></td>
            <td><?php echo ($v["userip"]); ?></td>
            <td><?php echo ($v["reporttime"]); ?></td>
            <td><a href='<?php echo U("Admin/Msgr/delHandle",array("delid"=>$v["id"]));?>'>删除</a></td><?php endforeach; endif; ?>
        <tr><td colspan="6"><?php echo ($page); ?></td></tr>
    </table>
</body>
</html>