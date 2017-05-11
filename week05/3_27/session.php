<?php
 
$name = "zhangSan";
$psw = "123456";
// 注意:使用session存储数据的时候,cookie中自动存储一条数据
// PHPSESSID ug83ue8eccd8g9c7h0tt11vo11
// 浏览器看不见存储的信息,服务器可以看见
// 
// 0.使用session之前把session开启
session_start();
// 1. 设置session
 $_SESSION['username'] = $name;
 $_SESSION['userpsw'] = $psw;
// 2. 获取session
 echo $_SESSION['username'];
// 3. 修改
 $_SESSION['username'] = "liSi";
// 4. 删除
// Notice: Undefined index: username in D:\wampstack\apache2\htdocs\week05\3-27\session.php on line 15
// 删除单个
 unset($_SESSION['userpsw']);
// 删除所有
 session_destroy();
// session和cookie的比较
// 1. 存储位置
// cookie存储在客户端的浏览器(内存/硬盘)
// session存储在服务器的内存/硬盘
// 2. 安全性
// session比cookie更安全,因为session放在服务器上,很难访问
// 3. 存储
// 强调:密码不要放到cookie中
// cookie:文件比较小.不太重要的....例如用户id,用户名称,用户昵称,浏览记录....
// session:比较重要的,文件比较小,例如密码...不要存储大量数据
// 4. 过期时间
// cookie:默认是"会话",可以手动指定过期时间
// session:默认是"会话"
// 补充:设置session的过期时间为7天
// 将session的数据存储到cookie中并设置过期时间
$_SESSION['name'] = 123;
$_SESSION['psw'] = 456;
setcookie(session_name(), session_id(), time() + 7 * 24 * 60 * 60);

// 1. session存储到了哪个地方?
// 查看php.ini   session.save_path = "D:/WAMPST~1/php/tmp"
// name|i:123;psw|i:456;   i -> int整数

// session.use_cookies = 1  不用动,如果改为0,cookie不能存储session
// session.name = PHPSESSID 不用动.可以设置session在cookie中的key
// session.auto_start = 0 不用动,如果设置为1,session_start()就可以不写了
//session.cookie_lifetime = 0 为0.表示过期时间为"会话"



