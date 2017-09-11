<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>TB天博检测</title>
    <link rel="stylesheet" href="/tpl/css/huace_last.css"/>
    <!-- <link rel="stylesheet" href="/tpl/css/common_xhy.css"/> -->
    <link rel="stylesheet" href="/ext/css/common_xhy.css"/>
    <script type="text/javascript" src="/tpl/js/jquery.min.js"></script>
    <script type="text/javascript" src="/tpl/jwplayer/jwplayer.js"></script>
    <script src="/tpl/js/jquery.hcjc.js"></script>
    <script src="/tpl/js/hcjc.js"></script>
    <script type="text/javascript" src="/tpl/js/dsg.min.js"></script>
    <script type="text/javascript" src="/tpl/script/jquery.shove-1.0.js"></script>

    <meta name="title" content="招聘"></meta>
    <meta name="description" content="招聘"></meta>
    <meta name="keywords" content="招聘"></meta>
    <meta http-equiv="cache-control" content="no-transform">
    <!-- 获取浏览器版本语言 -->
    <!-- 检测手机用户 -->
    <SCRIPT LANGUAGE="JavaScript">
        $(function(){
            function mobile_device_detect(url)
            {
                var bool = true;
                var thisOS=navigator.platform;
                var os=new Array("iPhone","iPod","iPad","android","Nokia","SymbianOS","Symbian","Windows Phone","Phone","Linux armv71","MAUI","UNTRUSTED/1.0","Windows CE","BlackBerry","IEMobile");
                for(var i=0;i<os.length;i++)
                {
                    if(thisOS.match(os[i]))
                    {
                        var bool = window.confirm("检测到您用手机登陆，是否打开手机网站");
                        if(bool){
                            window.location=url;
                            break;
                        }else{
                            return false;
                        }
                    }
                }
                //因为相当部分的手机系统不知道信息,这里是做临时性特殊辨认
                if(navigator.platform.indexOf('iPad') != -1)
                {
                    var bool = window.confirm("检测到您用手机登陆，是否打开手机网站");
                    if(bool){
                        window.location=url;
                    }else{
                        return false;
                    }
                }
                //做这一部分是因为Android手机的内核也是Linux
                //但是navigator.platform显示信息不尽相同情况繁多,因此从浏览器下手，即用navigator.appVersion信息做判断
                var check = navigator.appVersion;
                if( check.match(/linux/i) )
                {
                    //X11是UC浏览器的平台 ，如果有其他特殊浏览器也可以附加上条件
                    if(check.match(/mobile/i) || check.match(/X11/i))
                    {
                        var bool = window.confirm("检测到您用手机登陆，是否打开手机网站");
                        if(bool){
                            window.location=url;
                        }else{
                            return false;
                        }
                    }
                }
                //类in_array函数
                Array.prototype.in_array = function(e)
                {
                    for(i=0;i<this.length;i++)
                    {
                        if(this[i] == e)
                            return true;
                    }
                    return false;
                }
            }
            mobile_device_detect("/");
        });
    </SCRIPT>
</head>
<body><div class="header" id="header">
    <a href="#" class="hidden"><img src="/tpl/image/hidden-logo.png"  id="logoimg" alt="天博检测logo" class="logo    f-l"/></a>
    <div class="t cl">
        <a href="#">  <img src="/tpl/img/logo.png" id="logoimage" style="width: 178px;height: 48px;" alt="天博检测logo" class="logo f-l"/></a>
        <!--搜索框 begin-->
        <div class="search f-r pl">s
            <form action="/search" method="get" id="allMessage">
                <input type="text" value="{{key_exists('key', $_REQUEST) ? $_REQUEST['key'] : ''}}" name="key" class="text" id="title"/>
                <div class="button"><a id="queryAllMessage" href="javascript:;"> <input type="button" value="" name="key"  /></a></div>
            </form>
            <i class="ra ra-lt ra-s-lt"></i>
            <i class="ra ra-lb ra-s-lb"></i>
        </div>
        <!--搜索框 end-->
        <!--<div class="link f-r">
            <a href="#" id="english">English</a>&nbsp;&nbsp; | &nbsp;&nbsp;<a title="" id="based">繁體中文</a>&nbsp;&nbsp; | &nbsp;&nbsp;<a href="#" id="userCenter">会员中心</a>&nbsp;&nbsp;

        </div>-->
    </div>
    <!-- Live800在线客服图标:在线图标[浮动图标] 开始-->
    <!--<script language="javascript" src="../chat.live800.com/live800/chatClient/floatButton.js/jid=6221860911/companyID=57128/configID=120034/codeType=custom">--></script>

    <!-- 在线客服图标:在线图标 结束-->
    <!--侧边栏 begin-->
    <div class="main_right_bar" id='fix_right_bar'>
        <i></i>
        <!-- 咨询 -->
        <div><a id="live800iconlinkhc"  target="_blank" href="javascript:void(0)" onclick="return openChat(this) " lim_company="57128"><img src="/tpl/hcPicture/201504151713082401.png" width="85px" height="86px"></a></div>
        <!-- 资讯 -->
        <div><a href="#"><img src="/tpl/hcPicture/201504151713086252.png" width="85px" height="86px"></a></div>

        <div style='display:none;'><a href='http://www.live800.com'>web对话</a></div>
        <script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-15504690-37']);
    _gaq.push(['_trackPageview']);
    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
    </script>
    <div style='display:none;'><a href='http://en.live800.com'>live chat</a></div>

</div>
<div class="b">
    @component('component.nav')
    @endcomponent
</div>
</div>
<div style="display: none;">
    <input type="hidden" value="" id="sessionUserName">
</div>
<script type="text/javascript">
    $(function(){
        $("#queryAllMessage").click(function(){
            //var title = $("#title").val();
            $("#allMessage").submit();
            //});
            //window.location.href="queryAllMessage.do?title="+title;
        });
    });
</script>
<script src="/tpl/script/j2f.js" type="text/javascript"></script>
<script>
    $(function(){
        if(BodyIsFt=="0"){
            $("#logoimage").attr("src","http://www.cti-cert.com/img/logo.png")
        }else if(BodyIsFt=="1"){
            $("#logoimage").attr("src","http://www.cti-cert.com/image/logofanti.png")
        }
        //简繁体回调函数
        StranCall = function(){
            if(BodyIsFt == 1){
                $("#logoimage").attr("src","http://www.cti-cert.com/image/logofanti.png")
            }else{
                $("#logoimage").attr("src","http://www.cti-cert.com/img/logo.png")
            }
        }
    });
</script>
<script type="text/javascript">
    $(function(){

        var sessionUserName = $("#sessionUserName").val();
        var p = $.trim(sessionUserName);
        if(p!=''){
            $("#userCenter").text(sessionUserName);
        }
    });
</script><!--顶部轮播图开始-->
    @component('component.barnner')
    @endcomponent
<!--顶部轮播图结束-->
<script type="text/javascript" src="http://hq.sinajs.cn/list=sz300012" charset="utf-8"></script>
<script type="text/javascript">
    Number.prototype.toFixed = function(d)
    {
        var s=this+"";if(!d)d=0;
        if(s.indexOf(".")==-1)s+=".";s+=new Array(d+1).join("0");
        if (new RegExp("^(-|\\+)?(\\d+(\\.\\d{0,"+ (d+1) +"})?)\\d*$").test(s))
        {
            var s="0"+ RegExp.$2, pm=RegExp.$1, a=RegExp.$3.length, b=true;
            if (a==d+2){a=s.match(/\d/g); if (parseInt(a[a.length-1])>4)
            {
                for(var i=a.length-2; i>=0; i--) {a[i] = parseInt(a[i])+1;
                    if(a[i]==10){a[i]=0; b=i!=1;} else break;}
            }
                s=a.join("").replace(new RegExp("(\\d+)(\\d{"+d+"})\\d$"),"$1.$2");
            }if(b)s=s.substr(1);return (pm+s).replace(/\.$/, "");} return this+"";
    };
</script>
<div class="gupiao">
    <div class="gupiao_center"></div>
</div>
<!--右侧内容区 begin-->

@yield('content')

</div>
<!--侧边栏 end-->
<script type="text/javascript" src="/tpl/script/jquery.mousewheel.min.js"></script>

<!--xhy_commonjs-->

<style>
    .footerid{ position:relative; height:132px; overflow:hidden}
    .footermain{ position:absolute;top:0px; left:0px;
    }
    .footerscorll{
        position:absolute;top:0px; left:100px;
        width:9px; height:132px;}
    .foooterbnt{
        position:absolute;top:0px; left: 47px;
        background:#424242;width:9px;
    }
    .footerid:hover .foooterbnt{ background:#adaaaa;}
</style>

@component('component.footer')
@endcomponent

<script type="text/javascript">
    /*================横向滚动条==============*/
    $(function(){
        $(".foooterbnt").map(function(){
            var scrollBtn = $(this),
                box = scrollBtn.parent().prev(".footermain"),
                boxwin=scrollBtn.parent().parent(),
                scrollBox = scrollBtn.parent(".footerscorll"),
                // 计算内容宽度
                liw = box.children("dd").eq(0).height();
            mr = parseInt(box.children("dd").eq(0).css("margin-bottom"));
            contentW = (liw+mr)*box.children("dd").length - mr;
            boxL = box.offset().top;
            content = box,
                tabhi=scrollBox.height();
            boxwin.mousewheel(function(e,d){

                flag = 1;
                z = event.pageY;
                wx = z-boxL;
                wy = scrollBtn.height() - wx;
                box.css("cursor","default");
                $("body").mousemove(function(event){
                    if(flag ==1){
                        var x = event.pageY-boxL;

                        if(x<=wx){
                            scrollBtn.css("top","0");
                            box.css("top","0");
                        } else if(x>=w+wx){
                            scrollBtn.css("top",w);

                            box.css("top", (contentW-box.height())-mr);
                        }  else {
                            scrollBtn.css("top",x-wx);

                            box.css("top",-(x-wx)*c);
                        }
                    }
                });


            });

            if(contentW<132){
                scrollBox.css("display","none")
            }
            scrollBtn.height(tabhi/contentW*tabhi) // 设置滚动条的宽度
            var w = scrollBox.height() - scrollBtn.height(), // 滚动条可以移动的距离
                c = (contentW -scrollBox.height())/w, // 滚动与内容的比例
                flag = 0, //判断鼠标是否按下,0为否，1为是
                z = 0, // 鼠标的x坐标初始值
                wx = 0, //鼠标点击位置距离滚动条左边的距离
                wy = 0, //鼠标点击位置距离滚动条右边的距离
                x = 0;

            scrollBtn.mousedown(function(){
                flag = 1;
                z = event.pageY;
                wx = z-boxL;
                wy = scrollBtn.height() - wx;
                box.css("cursor","default");
                $("body").mousemove(function(event){
                    if(flag ==1){
                        var x = event.pageY-boxL;

                        if(x<=wx){
                            scrollBtn.css("top","0");
                            box.css("top","0");
                        } else if(x>=w+wx){
                            scrollBtn.css("top",w);

                            box.css("top", (contentW-box.height())-mr);
                        }  else {
                            scrollBtn.css("top",x-wx);

                            box.css("top",-(x-wx)*c);
                        }
                    }
                });
                $("body").mouseup(function(){
                    flag = 0;
                    document.onmousemove=null;
                    document.onmouseup=null;
                });
                return false;

            });



        });
    })
</script>
<div id="out_alert"> </div>
<div id="alert">
    <div class="doc-txt" style="width: 852px;height: 420px;">
        <div id="container">
        </div>
    </div>
    <a href="#" id="close"></a>

</div>
<input type="hidden" value="0" id="value3">
<script type="text/javascript">
    $(function(){
        var count = $("#value3").val();
        if(count == 1){
            $("#video_img").hide();
        }
    });
    function WinTip(){
        var opt={
            width:852,
            height:420
        }
        var alertId=$("#alert"),
            WinW=$(window).width(),
            WinH=$(window).height(),
            left=(WinW-opt.width)/2,
            top=(WinH-opt.height)/2;
        alertId.css({"display":"block","left":left,"top":top,"width":opt.width,"height":opt.height});
        $("#out_alert").css({"display":"block"});
        $("#close").on("click",function(){
            alertId.hide()
            $("#out_alert").hide()
        })
    }
</script>
<script>

</script>
<script type="text/javascript">
    var thePlayer;  //保存当前播放器以便操作
    $(function(){
        var url ="";
        url+='/upload/media/fronts/2016/20160711/201607111704319165.mp4' ;
        var video_url =url;
        thePlayer = jwplayer('container').setup({
            flashplayer: 'http://www.cti-cert.com/kindeditor/plugins/jwplayer/player.swf',
            file: video_url,
            width: 852,
            height: 420,
            dock: false,
            autostart:false
        });

    });
</script>
<script type="text/javascript">
    $(".uss-btn-two").click(function(){
        window.location.href="http://mylims.cti-cert.com/home/index";
    });
    $(".uss-btn-one").click(function(){
        var name = $("#service_name").val();
        var pass = $("#service_pass").val();
        param["pass"] = pass;//每页数量
        $.shovePost("queryMD5Pass.do",param,function(data){
            window.location.href='http://mylims.cti-cert.com/home/index/?Userid='+name+'&Pwd='+data.password;
        });
    });
    $(".uss-btn-three").click(function(){
        window.location.href="resourceInit.do?id=16";
    });
</script>
<script type="text/javascript">
    $(function(){
        $("#service_list").click(function(){
            window.location.href = "#";
        });
        $("#profession_list").click(function(){
            window.location.href = "#";
        });
        $("#plan_list").click(function(){
            window.location.href = "#";
        });
        $("#news_list").click(function(){
            window.location.href = "#";
        });
        $("#hangye_list").click(function(){
            window.location.href = "#";
        });
    });
</script>


@yield('scripts')
@component('component.common_xhy_js')
@endcomponent
</body>
</html>

