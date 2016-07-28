<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>lovelive</title>
    <style>

        #div1{margin-left: 25%;margin-top: 15%}
        #div2{margin-left: 25%;margin-top: 3%}
        img{margin: 10px}
        .div3{position: absolute;z-index: 100;top: 40%;left: 30%}
        #overcover{ width:100%;
                    height:100%;  top:0px;left: 0px;
                    background-color:#EEEEEE;
                    opacity:0.7;
                    -moz-opacity: 0.7;
                    position:absolute;  z-index:99;  filter: alpha(opacity=60)
                  }
        .abstract{  display: block;
                    background-color: #ffd1be;
                    width: 260px;height: auto;
                    padding: 10px;
                    opacity: 0.6;
                    -moz-opacity: 0.6;
                    position: absolute;
                    z-index: 50;
                    float: left;
                    margin: 0px;
                    -webkit-user-select:none;
                    -moz-user-select:none;
                    -ms-user-select:none;
                    user-select:none;
                  }
    </style>
    <script src="/lovelive/./guestbook/Index/Tpl/Public/js/jquery-2.1.4.js"></script>
    <script>
        $(function(){
            $(".div3").hide();

//                    $("#overcover").css(
//                            {   'width':'100%',
//                                'height':'auto',
//                                'top':'0',
//                                'background-color':'white',
//                                'opacity':'0.9',
//                                'position':'abosolute',
//                                'z-index':'99',
//                                'filter': 'alpha(opacity=60)'
//                            });
            $("#overcover").hide();
            $(".abstract").hide();
            $("img").click(function(){          //点击图片弹出播放器
                var x = this.id;
                 value = x.replace(/[^0-9]/ig,"");
                $("#video"+value).fadeIn();
                $("#overcover").fadeIn();
            });
                //隐藏播放器与遮盖层
                $(".close").click(function(){
                    $("video").trigger("pause");
                    $(".div3").fadeOut();
                    $("#overcover").fadeOut();
            });
                $("img").mousemove(function(e){   //弹出简介
                var x = this.id;
                var value = x.replace(/[^0-9]/ig,"");
                $("#single"+value).fadeIn();
                var pointX = e.pageX+1;
                var pointY = e.pageY+1;
                $("#single"+value).css(
                        {'top':pointY, 'left':pointX}
                );

                }).mouseleave(function(){

                $(".abstract").fadeOut();
            });


        });

    </script>
</head>
<body style='background: url("/lovelive/./guestbook/Index/Tpl/Public/images/background1.jpg") no-repeat top center;' >

    <div id="div1">
        <img id="img1" src="/lovelive/./guestbook/Index/Tpl/Public/images/img1.jpg">
        <span id="single1" class="abstract">2010年8月15日，首张单曲《仆らのLIVE 君とのLIFE》限定版于C78先行贩卖，Oricon记录的销量为434张。8月25日一般流通盘发售开始；
            在手机网站“电击G's Mobile”上举行了第一回人气投票，排名最高的角色成为二单的center；</span>
        <img id="img2" src="/lovelive/./guestbook/Index/Tpl/Public/images/img2.jpg">
        <span id="single2" class="abstract">2010年12月，第二单曲《Snow halation》开始发售。
            2010年11月号公布了企划的声优团体和名称，μ's采用决定。（投稿者御児勇马在介绍中说道：这个名字来源于希腊神话中掌管音乐舞蹈和文艺的女神缪斯。而九人的成员正好和缪斯女神的数量相吻合）。</span>
        <img id="img3" src="/lovelive/./guestbook/Index/Tpl/Public/images/img3.jpg">
        <span id="single3" class="abstract">2011年8月，第三张单曲《夏色えがおで1,2,Jump！》发售；第三回人气投票开始，排名最高者成为四单center；
                           2011年9月3日，为了纪念三单发售，缪斯全员集合的发售纪念活动于9月3日举办。
                            活动内容包括礼物抽选会，广播公开录音（10月14日配信）以及庆祝party，并与party的最后公开了举办第一场LIVE的消息；</span>

    </div>
    <div id="div2">
        <img id="img4" src="/lovelive/./guestbook/Index/Tpl/Public/images/img4.jpg">
        <span id="single4" class="abstract">2012年2月，第四单曲《もぎゅっと“love”で接近中！》发售，第四回人气投票开始，排名最高者成为五单center；</span>
        <img id="img5" src="/lovelive/./guestbook/Index/Tpl/Public/images/img5.jpg">
        <span id="single5" class="abstract">2012年9月，第五单曲《wonderful rush！》发售；漫画单行本第一卷发售；
                           2012年9月15日，《LoveLive！》TV动画化确定。</span>
        <a href="<?php echo U('Index/index/bbs');?>" title="bbs"><img src="/lovelive/./guestbook/Index/Tpl/Public/images/bbs.jpg"></a>
    </div>
    <div id="video1" class="div3"><video  src="/lovelive/./guestbook/Index/Tpl/Public/1st.mp4" controls></video><span class="close">close</span></div>
    <div id="video2" class="div3"><video  src="/lovelive/./guestbook/Index/Tpl/Public/2nd.mp4" controls></video><span class="close">close</span></div>
    <div id="video3" class="div3"><video src="/lovelive/./guestbook/Index/Tpl/Public/3rd.mp4" controls></video><span class="close">close</span></div>
    <div id="video4"  class="div3"><video src="/lovelive/./guestbook/Index/Tpl/Public/4th.mp4" controls></video><span class="close">close</span></div>
    <div id="overcover"></div>
</body>
</html>