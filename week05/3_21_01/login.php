<?php 

//这两个都是数组
//    $_GET:
//    $_POST:
var_dump($_POST);
//1 回话控制 session
//2 回话跟踪的两种方式:
//cookie:曲奇饼干
//浏览关闭掉,ｃｏｏｋｉｅ会自动删除,过期时间是"回话"
// 1) 由服务器发送给客户端一个片段,存有一些信息,保存在客户端的浏览器内存/硬盘中
//
//session:
if (isset($_POST['aotulogin'])) {
    echo '自动登录';
} else {
//     setcookie()
//    参数1:
    // 参数5:domain领域,域名
    // 域名1:www.baidu.com
    // 域名2:news.baidu.com
    // 如果在域名1中登陆账号,想让域名2也能获得账号信息,需要设置domain  .baidu.com
//    参数6:secure安全

    $name = $_POST["name"];
    $psw = $_POST["psw"];
    setcookie("username", $name);
    setcookie("userpsw",$psw ,time()+3*24*60*60);
    
}
?>