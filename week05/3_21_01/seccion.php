<?php
$name ="zhangsan";
$psw ="123456";
//注意:session存储数据的时候,cookie会自动存储一条数据
//PHPSESSID
//浏览器看不到存储的系信息,服务器可以看见
//0.开启回话
session_start();
$_SESSION['name']=123;
$_SESSION['psw']=123456;
session_name();
session_id();
setcookie(session_name(),session_id(),time()+7*24*60*60);
//1.设置session   
//$_SESSION['username'] = $name;
//$_SESSION['username'] = $name;
//2.获取session
// echo $_SESSION['username'];
// 3 修改
// $_SESSION['username'] = "lisi";
// 4.删除
//强制删除某一个字段
//unset($_SESSION['userpsw']);
//删除所有
session_destroy();


?>