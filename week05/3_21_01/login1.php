<?php
if(isset($_GET['ac'])&& $_GET['ac']=="logout"){
//    删除cookie
//    unset();是强制删除
//    让时间失效:过期之后,cookie自动删除
    setcookie("username"," ",time() - 1);
    setcookie("userpsw"," ",time() - 1);
//    三种退出方法
//    return;
    exit();
//    die();//强制死掉

}
if(isset($_COOKIE['username'])){
echo '登陆过';
}else {
    $name = $_POST['name'];
    $psw = $_POST['psw'];
    if (isset($_POST['autologin'])) {
        // 自动登陆
        // 单点登录
//        域名不同是不能互相登陆cookie
        setcookie("username", $name, time() + 7 * 24 * 60 * 60,"",".php.io");
        setcookie("userpsw", $psw, time() + 7 * 24 * 60 * 60,"",".php.io");
    } else {
        // 普通登陆
        setcookie("username", $name);
        setcookie("userpsw", $psw);
    }
}
