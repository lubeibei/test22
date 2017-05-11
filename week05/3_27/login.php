<?php

// 这两个人都是数组
// $_GET:保存所有get请求的参数
// $_POST:保存所有post请求的参数

// 重点:会话控制
// 1.会话session:打开浏览器,到关闭浏览器,这个过程就是会话
// 2.会话跟踪的两种方式
// Cookie:曲奇饼干
// 1) 由服务器发送给客户端一个片段,存有一些信息,保存在客户端的浏览器内存/硬盘中

// Session
if (isset($_POST['autologin'])) {
    echo '自动登陆';
    $name = $_POST['name'];
    $psw = $_POST['psw'];
} else {
    $name = $_POST['name'];
    $psw = $_POST['psw'];
    // 1. 设置cookie
    // 参数1:key
    // 参数2:value
    // 特点:浏览器关闭,cookie自动删除,过期时间是"会话"
    // 如果没选中自动登陆/七天内登陆
    setcookie("username", $name);
    // 参数3:expire到期,过期,单位是秒
    // 一般,超过过期时间会自动删除
    // 特殊情况:如果浏览器存储大量的cookie,可能会随机删除某一个
    // 如果选中自动登陆/七天内登陆
    setcookie("userpsw", $psw, time()+7*24*60*60);
    // 参数4:path路径
    // 路径1: c:/a/b/1.jpg
    // 路径2: c:/a/b/c/2.jpg
    // 路径3: c:/
    setcookie("a", "a", time()+360, "/");
    // 参数5:domain领域,域名
    // 域名1:www.baidu.com
    // 域名2:news.baidu.com
    // 如果在域名1中登陆账号,想让域名2也能获得账号信息,需要设置domain  .baidu.com
    setcookie("b", "b", time()+360, "/", "");
    // 参数6:secure安全
    // http://******
    // https://****
}

