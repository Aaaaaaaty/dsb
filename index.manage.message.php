<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>梦幻空间网络日记</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<nav class="l">
    <div ><img id="logo"src="image/logo.png" alt=""></div>
    <ul>
        <li class="nav-first nav-first-s" id="home"><a href="#"><img src="image/home.png" class="icon" alt="">主页</a><div class="nav-bg"></div></li>
        <li class="nav-first " id="assis"><a href="#"><img src="image/assis.png" class="icon" alt="">理财助手</a><div class="nav-bg"></div></li>
        <li class="nav-first" id="clock"><a href="clock.html"><img src="image/clock.png" class="icon" alt="">网页闹钟</a><div class="nav-bg"></div></li>
        <li class="nav-first" id="diary"><a href="#"><img src="image/diary.png" class="icon" alt="">我的日记</a><div class="nav-bg"></div></li>
        <li class="nav-first" id="manage"><a href="change.pwd.html"><img src="image/manage.png" class="icon" alt="">管理日记</a><div class="nav-bg"></div></li>
        <li class="nav-first" id="quit"><a href="login.html"><img src="image/quit.png" class="icon" alt="">退出</a><div class="nav-bg"></div></li>
        <li id="copyRight"><p>Copyright©An</p> All Rights Reserved</li>
    </ul>
</nav>
<div class="l section" id="wrapper">
    <h1>HOME</h1>
    <span class="underline"></span>
    <h3>状态</h3>
    <?php
    $conn = mysqli_connect('localhost','root','');
    mysqli_select_db($conn,'myapp');
    $result = mysqli_query($conn,'SELECT * FROM message');
    $result_num = mysqli_num_rows($result);
    $message_p = array();
    $message_r = array();
    $array = array();
    for($i = 1; $i < 75; $i++){
        $array["[em_".$i."]"] = "<img src='arclist/".$i.".gif'>";
    }
    for($i=0;$i<$result_num;$i++){
        $result_arr = mysqli_fetch_assoc($result);
        $message = $result_arr['message'];
        $message_result = strtr($message, $array);
        echo "<div class='message_all'><div class='message_result l'>$message_result</div>
        <a class='num_$i' style='position:relative;top: 13px;left: 256px;color: rgba(0,170,170,1);cursor: pointer;'>删除</a><div class='c'></div>
        <span class='underline'></span></div>";
    }
    ?>
</div>
<!-- 弹窗 -->
<div id="bg"></div>
<div id="box-over">
    <div class="box" style="display:none">
        <h2 class="color">发布日记<a href="#" class="close"><img src="image/ic.png" alt=""></a></h2>
        <div class="list">
            <form action="manage.message.php" method="post">
                <textarea class="input" id="saytext" name="sayText">现在在想什么？</textarea>
                <p><span class="emotion "><img class="smail" src="image/smail.png" alt="">表情</span></p>
                <a href=""><button id="submit"class="color" type="submit">提交</button></a>
            </form>

        </div>
    </div>
</div>
</body>
<script src="js/jquery-2.1.1.min.js"></script>
<!--<script type="text/javascript" src="js/spin.min.js" ></script>-->
<script>
    $(document).ready(function(){
        // 二级菜单
        (function secMenu(){
            // 理财二级
            $('#assis').mouseenter(function(){
                $('#assis').after('<span class="nav-tip"><ul><li class="nav-sec"><a href="pay.html">添加收入</a></li><li class="nav-sec"><a href="income.html">添加支出</a></li><li class="nav-sec"><a href="manage.pay.html">收入查询</a></li><li class="nav-sec"><a href="manage.income.html">支出查询</a></li></ul></span>');
                $('#assis').find('div').addClass('nav-bg-s');
            });
            $('#home,#clock').mouseenter(function(){
                $('.nav-tip').remove();
                $('#assis').find('div').removeClass('nav-bg-s');
            });
            // 日记二级
            $('#diary').mouseenter(function(){
                $('.nav-tip').remove();
                $('#assis').find('div').removeClass('nav-bg-s');
                $('#diary').after('<span class="nav-tip-d"><ul><li class="nav-sec diary"><a href="#">发布日记</a></li><li class="nav-sec"><a href="#">删除日记</a></li></ul></span>');
                $('#diary').find('div').addClass('nav-bg-s');
                $(".diary").click(function () {
                    $('#bg').show()
                    $('#bg').animate({opacity:'0.8'},'slow',function(){
                        var $box = $('.box');
                        $box.css({
                            display: "block"
                        });
                    });
                    $("#bg").css({height: $(document).height()});
                });
            });
            $('#manage,#clock').mouseenter(function(){
                $('.nav-tip-d').remove();
                $('#diary').find('div').removeClass('nav-bg-s');
            });
            $('#wrapper').mouseenter(function(){
                $('.nav-tip').remove();
                $('#assis').find('div').removeClass('nav-bg-s');
                $('.nav-tip-d').remove();
                $('#diary').find('div').removeClass('nav-bg-s');
            });
        })();
        //点击关闭按钮的时候，遮罩层关闭
        $(".close").click(function () {
            $("#bg,.box").css("display", "none");
            $('#bg').css('opacity','0');
        });
        // 清空area
        $('#saytext').click(function(){
            if($('#saytext').val() == '现在在想什么？'){
                $('#saytext').val('');
            }
        })
    });
</script>
<script type="text/javascript" src="js/jquery.qqFace.js"></script>
<script type="text/javascript">
    $(function(){
        $('.emotion').qqFace({
            id : 'facebox',
            assign:'saytext',
            path:'arclist/' //表情存放的路径
        });
        $(".sub_btn").click(function(){
            var str = $("#saytext").val();
            $("#show").html(replace_em(str));
        });
    });
    //查看结果
    function replace_em(str){
        str = str.replace(/\</g,'&lt;');
        str = str.replace(/\>/g,'&gt;');
        str = str.replace(/\n/g,'<br/>');
        str = str.replace(/\[em_([0-9]*)\]/g,'<img src="arclist/$1.gif" border="0" />');
        return str;
    }
</script>
<!--    动态检测页面高度-->
<script>
    $(document).ready(function () {
        $('nav').height($(document).height());
        $('#copyRight').css('margin-top',$(document).height()-$('#quit').offset().top - $('#logo').height());
    })
</script>
<script>
    $(document).ready(function () {
        var num = $('.message_all').length;
        for (var i=0; i<num; i++){
            $('.num_'+i).bind("click", {index: i}, clickHandler);
        }
        function clickHandler(event) {
            var i= event.data.index;
            console.log(i);
            var result = $('.num_'+i).prev().html();
            console.log(result);
            result = result.replace(/</g, "&lt;");
            result = result.replace(/>/g, "&gt;");
            $.ajax({
                type:"POST",
                url:"delete.message.php",
                data: {
                    message: result
                },
                success: function (data) {
                    alert(data);
                }
            });
            $('.num_'+i).parent().remove();
        }
    })
</script>
</html>
