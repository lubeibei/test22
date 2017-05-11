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
if(isset($_COOKIE['username'])){
echo '您已经登录过了';
}else {
    if (isset($_POST['autologin'])) {
        setcookie("username", $name, time() + 2 * 60 * 60);
        sercookie("password", $psw, time() + 2 * 60 * 60);
    } else {
        setcookie("username", $name);
        setcookie("password", $psw);
    }
}
?>