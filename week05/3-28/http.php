<?php
/* 
 * 1. 网络七层协议
 * 1) 哪七层,背下来.
 * 应用层 表示层 会话层 传输层 网络层 链路层 物理层
 * http 位于 应用层
 * 会话管理 位于 会话层
 * TCP传输控制协议 UDP用户报文协议 Socket套接字 位于 传输层

 * 2. HTTP原理
 * 协议 ===>  说明书
 * 超文本 ===> 图片,视频,音频....
 * HTTP:HyperText Transfer Protocol 超文本传输协议
 * HTTPS
 * S Secure 安全
 * 抓包软件:Charles 可以截获请求,修改参数并重新发送
 *
 * 
 * 
 * HTTP 采用了请求/响应模型 C/S结构 (Client客户端/Server服务器)
 * 请求:客户端发给服务器
 * 响应:服务器返回给客户端
 * 客户端:电脑,网页,手机,QQ,音乐播放器....
 * 服务器:电脑,手机
 * 服务器的性能和配置比客户端高
 * 
 * 
 *  * 原理的基本步骤
 * 1) 客户端连接到web服务器
 * 2) 发送HTTP请求
 * 3) 服务器接收请求并返回HTTP响应
 * 4) 释放连接
 * 5) 客户端浏览器解析数据



 模拟发送请求和获取响应  通过终端  window键+r 输入cmd 回车
 * 输入 telnet www.baidu.com 80 回车
 * 输入 control+] 回车
 * 输入 回车
 * 输入 GET /index.html HTTP/1.1
 *      HOST:www.baidu.com 连续两次快速回车
 * 
 * 请求报文的组成部分:请求行,请求头,空行,请求数据
 * 请求行: GET /index.html HTTP/1.1
 * 请求头:HOST:www.baidu.com  key:value
 * 空行:第一次回车
 * 请求数据:第二次回车
 * 
 * 响应报文的组成部分:状态行,响应头,空行,响应数据
 * 状态行: HTTP/1.1 200 OK
 * 响应头: key:value
 * 空行
 * 响应数据:
 * 
 * 
 * 面试题:HTTP的两种报文是什么?请求报文和响应报文
 * 两种报文的组成结构?
 * 
 * 补充
 * 1. 请求方法有哪些? GET POST HEAD PUT DELETE OPTIONS TRACE CONNECT
 * 建议:除了知道GET和POST以外,再记两个
 * 2. 错误状态码
 * 200 OK
 * 404 页面没找到
 * 500 服务器错误
 * 1xx:
 * 2xx:
 * 3xx:
 * 4xx:
 * 5xx:
 */

 



?>