<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>bbs</title>
    <style>
        body{max-width: 100%;height: auto;overflow: hidden}
        #logo{margin-left: 45%}
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
        }
        form{text-align: center;padding: 10px;line-height: 20px}
        h2{font-family: 微软雅黑;text-align: center}
        textarea{resize: none;width: 240px;height: 100px;vertical-align: top}
        .close{float: right;font-size:xx-large;cursor: pointer}
        .submit{display: block;background-color: #32e1ff;
                border-radius: 5px;text-align: center;
                text-decoration: none;padding: 5px;color: #EEEEEE;font-weight: 600;
                font-family: 微软雅黑;}
        .book{width: 391px;height: 278px;position: absolute;z-index: 1;
                moz-user-select: -moz-none;
                -moz-user-select: none;
                -o-user-select:none;
                -khtml-user-select:none;
                -webkit-user-select:none;
                -ms-user-select:none;
                user-select:none;}
        .close2{float: right;font-size: xx-large;font-family: 微软雅黑}
        .report{position: absolute;}
        p{text-align: center;text-indent: 2em;word-wrap: break-word}
        .message{position: absolute;bottom: 0}
        .username{float: right;right: 0}
        .time{float: left}
        #kotori{position: absolute;bottom: 0;left: 0}
    </style>
    <script src="/lovelive/./guestbook/Index/Tpl/Public/js/jquery-2.1.4.js"></script>
    <script>
        $(function(){
            $("#appear").hide();
            $("#mask").hide();
            $("#logo").click(function(){
                $("#mask").show();
                $("#appear").show();
            });
            $("#namecot").keyup(function(){
                var x = $("#namecot").val().length;
                if (x>10){
                    var num = $("#namecot").val().substr(0,10);
                    $("#namecot").val(num);
                }
                else {$("#countname").text(10-$("#namecot").val().length);}
            });
            $("#contcount").keyup(function(){
                var x = $("#contcount").val().length;
                if (x>50){
                    var num = $("#contcount").val().substr(0,50);
                    $("#contcount").val(num);
                }
                else {$("#countcont").text(50-$("#contcount").val().length);}
            });
            $(".close").click(function(){
                $("#appear").hide();
                $("#mask").hide();
            });

            var move = false;
            var _x,_y;
            var zindex;
            $(".book").click(function(){
                $(".book").css({'z-index':'-1'});
                $(this).css({'z-index':'2'});
            }).mousedown(function(e){

                move = true;
                _x=e.pageX-parseInt($(this).css("left"));
                _y=e.pageY-parseInt($(this).css("top"));
                $(this).fadeTo(20, 0.5);
                $(this).mousemove(function(e){

                    if (move){
                        var x = e.pageX-_x;
                        var y = e.pageY-_y;
                        $(this).css({'top':y,'left':x});

                    }
                }).mouseup(function(){
                    move = false;
                    $(this).fadeTo("fast", 1);
                }); });
//            var randx = 100+500*Math.random();
//            var randy = 100+500*Math.random();
//            $(".book").css({'left':randx,'top':randy});
//            var _move=false;//移动标记
//            var _x,_y;//鼠标离控件左上角的相对位置
//            $(".book").click(function(){
//                //alert("click");//点击（松开后触发）
//            }).mousedown(function(e){
//                _move=true;
//                _x=e.pageX-parseInt($(".book").css("left"));
//                _y=e.pageY-parseInt($(".book").css("top"));
//                $(".book").fadeTo(20, 0.5);//点击后开始拖动并透明显示
//            });
//            $(document).mousemove(function(e){
//                if(_move){
//                    var x=e.pageX-_x;//移动时根据鼠标位置计算控件左上角的绝对位置
//                    var y=e.pageY-_y;
//                    $(".book").css({top:y,left:x});//控件新位置
//                }
//            }).mouseup(function(){
//                _move=false;
//                $(".book").fadeTo("fast", 1);//松开鼠标后停止移动并恢复成不透明
//            });
            $(".close2").click(function(){
                $(this).parent('.book').hide();
            });
            $("#kotori").hide();
            $(document).mousemove(function(e){
                if (e.pageX<400&& e.pageY>500){
                    $("#kotori").show('fast');
                }
            });
            $(document).mousemove(function(e){
                if (e.pageX>400|| e.pageY<500){
                    $("#kotori").hide();
                }
            });
//
     });

        function change_code(){

            document.getElementById('code').src= "<?php echo U('Index/index/verify');?>"+'/'+Math.random();
        }
        function rand(){
            var len = $(".book").length;
            for (var i = 0; i < len; i++) {
                $(".book").eq(i).css("top", Math.random() * 75 + "%");
                $(".book").eq(i).css("left", Math.random() * 80 + "%");
            }
        }

    </script>
</head>
<body style='background: url("/lovelive/./guestbook/Index/Tpl/Public/images/bbsback.jpg") center top repeat; background-size: cover;'onload="rand();">
    <img src="/lovelive/./guestbook/Index/Tpl/Public/images/us2.png" id="logo"><span style="float: right"><?php echo ($page); ?></span>
    <div id="appear">
        <span class="close">×</span><h2>发表</h2>
        <form action="<?php echo U('Index/index/result');?>" method="post" name="form1">
            名字:<input type="text" name="username" id="namecot" placeholder="不多于10个文字" />还剩<span id="countname">10</span>个字<br><br>
            内容：<textarea name="content" id="contcount" placeholder="不多于50个文字"></textarea>还剩<span id="countcont">50</span>个字<br>
            头像:<select id="face" onchange='document.getElementById("facechoose").src=this.value;' name="face">
                    <option value="/lovelive/./guestbook/Index/Tpl/Public/images/face1.png">face1</option>
                    <option value="/lovelive/./guestbook/Index/Tpl/Public/images/face2.png">face2</option>
                    <option value="/lovelive/./guestbook/Index/Tpl/Public/images/face3.png">face3</option>
                    <option value="/lovelive/./guestbook/Index/Tpl/Public/images/face4.png">face4</option>
                    <option value="/lovelive/./guestbook/Index/Tpl/Public/images/face5.png">face5</option>
                    <option value="/lovelive/./guestbook/Index/Tpl/Public/images/face6.png">face6</option>
                    <option value="/lovelive/./guestbook/Index/Tpl/Public/images/face7.png">face7</option>
                    <option value="/lovelive/./guestbook/Index/Tpl/Public/images/face8.png">face8</option>
                    <option value="/lovelive/./guestbook/Index/Tpl/Public/images/face9.png">face9</option>
                </select>
            <img src='/lovelive/./guestbook/Index/Tpl/Public/images/face1.png'  id="facechoose"><br>
            验证码:<input type="text" name="yanzhengma"/> <img src="<?php echo U('Index/index/verify');?>" id="code"> <a href="javascript:void(change_code(this))">看不清</a><br>
            <a href="javascript:document.form1.submit();" class="submit"><h1>Submit</h1></a>


        </form></div>
    <?php if(is_array($list)): foreach($list as $key=>$v): ?><div class="book" style='background: url("/lovelive/./guestbook/Index/Tpl/Public/images/back<?php echo mt_rand(2,4);?>.png") no-repeat;' >
            <img src="<?php echo ($v["face"]); ?>">NO.<?php echo ($v["id"]); ?><span><form  class="report" action="<?php echo U('Index/index/report');?>" method="post"><input type="hidden" value="<?php echo ($v["id"]); ?>" name="report"><input type="submit" value="举报"></form></span><span class="close2">×</span>
            <br><p><?php echo ($v["content"]); ?></p><p class="message"><span class="time"><?php echo ($v["time"]); ?></span><span class="username"><?php echo ($v["username"]); ?></span></p>
        </div><?php endforeach; endif; ?>
    <img id="kotori" src="/lovelive/./guestbook/Index/Tpl/Public/images/2333.png">
<div id="mask"></div>
</body>
</html>