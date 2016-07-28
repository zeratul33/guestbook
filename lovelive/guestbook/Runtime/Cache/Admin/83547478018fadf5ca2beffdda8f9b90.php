<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>
    <style>
        #top{width: 100%;height:150px}
        #left{width: 200px;height:auto;position:relative;float: left;background-color:#eae7ff;text-align: center}
        #left a {display: block;border: 1px solid #000000;border-radius: 4px;
            background-color:#b9b2ff;padding-top: 10px;padding-bottom: 10px;
            text-decoration: none;color:#000000;font-family: 微软雅黑;}
        #right{float: left;}
    </style>
    <script src="/lovelive/./guestbook//Admin/Tpl/Public/js/jquery-2.1.4.js"></script>
    <script>
        function resize_window(){
            $("#left").height($(window).height()-150);
            $("#right").height($(window).height()-150).width($(window).width()-250);
        }
        $(function(){
            resize_window();
            $(window).resize(function(){
                resize_window();
            })
        })
    </script>
    <base target="tag">
</head>
<body>
    <div>
        <div id="top" style='background: url("/lovelive/./guestbook//Admin/Tpl/Public/images/title.png") no-repeat  top center ;'></div>
        <div>
            <div id="left">
                <a href="<?php echo U('Admin/Msgr/index');?>">帖子列表</a><br>
                <a href="<?php echo U('Admin/Msgr/contentDel');?>">举报列表</a><br>
                <a href="<?php echo U('Admin/Msgr/delreport');?>">删除列表</a><br>
                <a href="<?php echo U('Admin/Rbac/index');?>">用户列表</a><br>
                <a href="<?php echo U('Admin/Rbac/role');?>">角色列表</a><br>
                <a href="<?php echo U('Admin/Rbac/node');?>">节点列表</a><br>
                <a href="<?php echo U('Admin/Rbac/addUser');?>">添加用户</a><br>
                <a href="<?php echo U('Admin/Rbac/addRole');?>">添加角色</a><br>
                <a href="<?php echo U('Admin/Rbac/addNode');?>">添加节点</a><br>
                <a href="<?php echo U('Admin/Index/logout');?>" target="_self">退出</a><br>

            </div>
            <div ><iframe name="tag" id="right" frameborder="no">right</iframe></div>
        </div>
    </div>
</body>
</html>