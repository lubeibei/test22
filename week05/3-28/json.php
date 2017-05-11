<?php

/*
 * 返回两个用户基本信息,结构如下
 * 用户id id
 * 用户名 name
 * 用户头像地址 head_img
 * 用户邮箱 email
 * 
 * 数据的组织形式:JSON XML
 * 数据来源:理论上数据库,暂时用数组代替
 */
// $user1 = [];
$user1['id'] = 1001;
$user1['name'] = "张三";
$user1['head_img'] = "http://img.ishuo.cn/doc/1610/1FZ3F11-0.jpg";
$user1['email'] = "123@qq.com";

$user2['id'] = 1002;
$user2['name'] = "李四";
$user2['head_img'] = "http://img3.imgtn.bdimg.com/it/u=3301049734,1885478127&fm=214&gp=0.jpg";
$user2['email'] = "456@qq.com";


/*
 * status: 如果1成功,如果0失败
 * users: 类型数组,放了user1,user2........
 */
$returnData['status'] = 1;
$returnData['users'][] = $user1;
$returnData['users'][] = $user2;

//var_dump($returnData);

//$data = <<<a
//    { "users": [
//    { "id": "1001", "name":"zhangsan", "email": "123@qq.com","head_img":"http://img.ishuo.cn/doc/1610/1FZ3F11-0.jpg" },
//    { "id": "1002", "name":"lisi", "email": "456@qq.com","head_img":"http://img3.imgtn.bdimg.com/it/u=3301049734,1885478127&fm=214&gp=0.jpg"}
//    ]}
//a;
//echo $data;


// json_encode将PHP对象转换为JSON格式
// 一般用数组存储数据然后转换为json
// encode:编码  php对象 -> json数据
// decode:解码  json数据 -> php对象
$encodeStr = json_encode($returnData);
//echo $encodeStr;
// 得到的不是原始的returnData
$a = json_decode($encodeStr);
// echo '<hr>';
// 参数2:默认为false,返回的是Object
// 写为true,返回编码前的数组
$a = json_decode($encodeStr, true);
// var_dump($a);

// PHP其它能够处理json的相关函数
// 1.serialize序列化 和 unserialize反序列化
// 可以处理除了资源类型以外的所有类型
// 资源类型:文件句柄 数据库句柄
// 不是json格式,只是一个按照某种规律生成的字符串
$ser1 = serialize($returnData);
//var_dump($ser1);
$ser2 = unserialize($ser1);
//var_dump($ser2);

// 2. var_export 和 eval 
//var_export($returnData);
// 和上面的功能一样,将对象转化为字符串
$var1 = var_export($returnData, true);
//var_dump($var1);

// 将字符串转化为对象
// 注意:使用单引号
eval('$a=3+5;echo $a;');
eval('$var2='.$var1.';');
//var_dump($var2);

// 3) wddx_serialize_value 和 wddx_deserialize
// 将对象转化为XML字符串
// 注意:浏览器会把xml当做html进行解析
$xmlStr = wddx_serialize_value($returnData);
//echo $xmlStr;
// 将XML字符串转化为对象
$obj = wddx_deserialize($xmlStr);
var_dump($obj);

// 重点要会的函数
// json_encode json_decode
// wddx_serialize_value wddx_deserialize
// eval
// 
// JSON.parse JSON.stringify



