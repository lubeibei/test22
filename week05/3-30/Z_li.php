
<?php 
header("content-type:text/html;charset=utf-8");
$subject = "abcdefA123";
$pattern = "#[[:alpha:]]#";
if (preg_match($pattern, $subject, $matches)) {
	echo "找到了".'<hr>';
	echo "<pre>";
	print_r($matches);
	echo "</pre>";
	echo "<hr>";
} else {
	echo "没找到".'<hr>';
}
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
                if(!pattern.test(content)){
                    $("#nameresult").html("<span style='color:red'>帐号格式不正确</span>");
                }
                
            });
        });
    </script>
</html>




