<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>login</title>
    <style>
        #mask{
            width:100%;
            height:100%;  top:0px;left: 0px;
            background-color:#EEEEEE;
            opacity:0.7;
            -moz-opacity: 0.7;
            position:absolute;  z-index:99;  filter: alpha(opacity=60)
        }
        #appear{
            display: block;
            width: 400px;
            height: auto;
            position: absolute;
            z-index: 1000;
            background-color: #fff2ea;
            margin-left: 38%;
            margin-top: 10%;
        }
        .submit{display: block;background-color: #32e1ff;
            border-radius: 5px;text-align: center;
            text-decoration: none;padding: 5px;color: #EEEEEE;font-weight: 600;
            font-family: 微软雅黑;}
        .close{float: right;font-size:xx-large;cursor: pointer}
        form{text-align: center;padding: 10px;line-height: 20px}
        h2{font-family: 微软雅黑;text-align: center}
    </style>
    <script src="/lovelive/./guestbook//Admin/Tpl/Public/js/jquery-2.1.4.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#appear").hide();
            $("#mask").hide();
            $("#appear").fadeIn();
            $("#mask").fadeIn();
        });
        function change_code(){

            document.getElementById('code').src= "<?php echo U('Admin/login/verify');?>"+'/'+Math.random();
        }

    </script>
</head>
<body style='background: url("/lovelive/./guestbook//Admin/Tpl/Public/images/lovelive.jpg") no-repeat top center;'>
<div id="appear">
    <span class="close">×</span><h2>发表</h2>
    <form action="<?php echo U('Admin/login/login');?>" method="post" name="form1">
        名字:<input type="text" name="username" />
        <br>
        密码：<input name="password" type="password"><br>
        验证码:<input type="text" name="yanzhengma"/> <img src="<?php echo U('Admin/login/verify');?>" id="code"> <a href="javascript:void(change_code(this))">看不清</a><br>
        <a href="javascript:document.form1.submit();" class="submit"><h1>Submit</h1></a>


    </form></div>
<div id="mask"></div>
</body>
</html>