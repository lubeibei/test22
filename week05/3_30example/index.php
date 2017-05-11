
<?php
//练习1:替换表情
//$subject = "今天真困<face>sm</face> 我都快睡了<face>sm</face> ";
//$pattern = "#<face>(.*?)</face>#";
//$replace = "<img src='$1.png'>";
//$result = preg_replace($pattern, $replace, $subject);
//echo $result;

$str = "我很困<face>sm</face> 我很困<face>sm</face>";
$pattern = "#<face>(.*?)</face>#";
$replace = "<img src='$1.png'>";
//preg_replace($pattern,$replace,$str)
$result = preg_replace($pattern, $replace, $str);
echo $result;
//???????????????????????????????????????????????????????????????????
// 练习2:请将文章中的毛泽东 江泽民 习近平 张飞 换为 毛*东 江*民 习*平
echo "<hr>";
$subject = "今天毛 泽 东邀请江泽民的同事习近平去看戏Fuck";
$pattern = "#(毛\s*泽\s*东|江\s*泽\s*民|习\s*近\s*平|Fuck)#";
$replacement = "$1";
$result = preg_replace_callback($pattern, function($matches) {
    $s = $matches[1];
    $s = str_replace(" ", "", $s);
    if (preg_match("/[a-zA-Z]/", $s) == false) {
        $res = substr_replace($s, "*", 3, 3);
    } else {
        $res = substr_replace($s, "*", 1, 1);
    }
    return $res;
}, $subject);
echo $result;
echo "<hr>";
?>

<html>
    <head>
        <title>title</title>
    </head>
    <body>
        <form action="">
            帐号:<input type="text" id="name" placeholder="请输入帐号"><span id="nameresut"></span><br>           
            手机号:<input type="text" id="phone" placeholder="请输入手机号"><br>
            邮箱:<input type="text" id="email" placeholder="请输入邮箱"><br>
            密码:<input type="text" id="psw" placeholder="请输入密码"><br>   
        </form>
        
    </body>
     <script type="text/javascript" src="http://validform.rjboy.cn/wp-content/themes/validform/js/jquery-1.6.2.min.js"></script>
    <script>
        $(function(){
//        input光标点击事件
//blur():光标消失
//focus():光标出现
            $("#name").blur(function(){
//                alert("光标消失");
                var content = $(this).val();
//              js如何调用正则表达式:第二个网站
//                var pattern = /\d{6,10}/;
//密码包含数字,字母,符号  ^(?![a-zA-Z0-9]+$)(?![^a-zA-Z/D]+$)(?![^0-9/D]+$).{10,20}$
                 var pattern = "#^(?![a-zA-Z0-9]+$)(?![^a-zA-Z/D]+$)(?![^0-9/D]+$).{10,20}$#";
//                console.log(pattern.test(content));//true 或flase
                if(!pattern.test(pattern,content)=){
                    $("#nameresult").html("<span style='color:red'>帐号格式不正确</span>");
                }
                
            });
        });
    </script>
</html>

