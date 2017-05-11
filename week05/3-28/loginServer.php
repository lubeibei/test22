<?php
session_start();
if ( isset($_COOKIE['token']) && isset($_SESSION['token']) && $_COOKIE['token'] == $_SESSION['token']) {
    $result['status'] = 2;
    $result['msg'] = "登陆成功";
    $result['info']["vip_level"] = 0;
    $result['info']['name'] = $_SESSION['name'];
    $result['info']['regist_time'] = 14567890;
    $result['info']['last_time'] = 18567890;
    $result['info']['login_add'] = "上海";
    echo json_encode($result);
    exit();
}
// $_GET $_POST $_COOKIE $_SESSION
// $_FILES 上传的文件信息
// 如果收不到上传数据,看一看表单是否设置enctype属性
// 模拟:已经注册有3个账号
$userinfo = [
    "zhangsan" => '456',
    "lisi" => '123',
    "wangwu" => '789',
];
$name = $_POST['phone'];
$psw = $_POST['psw'];
// 判断value是否在数组中,不是判断key
// 注意:if else 不要嵌套太多,否则太乱
if (!isset($userinfo[$name])) {
    $result['status'] = 0;
    $result['msg'] = "账号不存在";
    echo json_encode($result);
    exit();
}
if ($userinfo[$name] != $psw) {
    $result['status'] = 1;
    $result['msg'] = "密码错误";
    echo json_encode($result);
    exit();
}

// cookie session

$_SESSION['name'] = $name;
$_SESSION['psw'] = $psw;
if (isset($_POST['autologin'])) {
    // token:令牌 相当于 请假条
    // 小明请假出校门 带有请假条 = 申请+签字+时间
    // token = 账号+密码+时间戳
    
    
     
    $token = md5($name . $psw . time());
    setcookie("token", $token, time() + 7 * 24 * 60 * 60);
//    $token在SESSION
    $_SESSION['token'] = $token;

    // 周期7天 
   setcookie(session_name(), session_id(), time() + 7 * 24 * 60 * 60);
} else {
    // 会话时间
    // 设置为半天
    setcookie(session_name(), session_id(), time() + 12 * 60 * 60);
}
$result['status'] = 2;
$result['msg'] = "登陆成功";
$result['info']["vip_level"] = 0;
$result['info']['name'] = $name;
$result['info']['regist_time'] = 14567890;
$result['info']['last_time'] = 18567890;
$result['info']['login_add'] = "上海";
echo json_encode($result);
