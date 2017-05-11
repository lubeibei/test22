<?php
if (isset($_GET['ac']) && $_GET['ac'] == "logout") {
    // 删除cookie:通过设置超时时间
    // unset()
    setcookie("username", "", time() - 1);
    setcookie("userpsw", "", time() - 1);
//    return;
//    die();
    exit();
}
$name = $_POST['name'];
$psw = $_POST['psw'];
if (isset($_COOKIE['username'])) {
    echo "您已经登陆了";
} else {
    if (isset($_POST['autologin'])) {
        // 自动登陆
        // 可以通过设置参数5来实现单点登陆
        // 域名不同是不能互相访问cookie的
        setcookie("username", $name, time() + 7 * 24 * 60 * 60,"", ".php.io");
        setcookie("userpsw", $psw, time() + 7 * 24 * 60 * 60,"", ".php.io");
    } else {
        // 普通登陆
        setcookie("username", $name);
        setcookie("userpsw", $psw);
    }
}

// 单点登陆SSO Single Sign On
// 百度登陆
// 只要在百度首页登陆一次,百度音乐,百度地图等不需要登陆了
// www.baidu.com   music.baidu.com  news.baidu.com
// localhost  127.0.0.1 192.168.****
// 
// 设置虚拟主机
// 1) 打开C:\Windows\System32\drivers\etc中的hosts文件
// 2) 在文件下方添加
// 127.0.0.1 www.php.io
// 127.0.0.1 study.php.io
// 127.0.0.1 www.test.io
// 保存 关闭

// 3) 打开D:\wampstack\apache2\conf 里面的 httpd.conf
// 去掉493行前边的#号   保存 关闭

// 4) 打开D:\wampstack\apache2\conf\extra 里面的 httpd-vhosts.conf
// 设置网址和路径
// 重启apache服务器


// 回顾
// var data = $(this).serialize();
// e.preventDefault();
// $("form").submit();

// setcookie(key,value,time,path,domain,httpOnly);
// time: 设置cookie的过期时间
// domain:实现单点登录

// session_start();
// $_SESSION[key] = value;
// unset($_SESSION[key])
// session_destroy();
// setcookie(session_name(),session_id(),time()+3600);






