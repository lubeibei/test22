<?php
// 体会正则表达式的用法=================================
// 思考:如何查找网页中的所有超链接?
// 简单使用正则表达式 检测一个字符串是否存在
// pattern 匹配模式
$str = "hello World Hello";
// ##指的是定界符,定界符中间写匹配模式
// i模式修饰符,忽略大小写
$pattern = "#Hello#i";
// 参数3:包含匹配的结果
// preg_match只能匹配第一个符合条件的字符串
// preg_match_all匹配所有符合条件的字符串
if (preg_match_all($pattern, $str, $matches)) {
    echo "找到了该字符串";
    var_dump($matches);
} else {
    echo '没找到该字符串';
}
// 练习:有一个字符串叫 Hello World.Nice to meet you.请统计o的出现次数
$subject = "Hello World.Nice to meet you.";
$pattern = "#o#i";
if (preg_match_all($pattern, $subject, $matches)) {
    echo "找到了" . count($matches[0]) . "个";
} else {
    echo '没有找到';
}
// 练习:输入一个邮箱,验证是不是一个邮箱?
// 思路:zhangsan@qq.com
// @  .
// 注意:定界符有好多,例如##,//,!!....
$subject = "1234.456@qq.com";
$pattern = "#\w[-\w.+]*@([A-Za-z0-9][-A-Za-z0-9]+\.)+[A-Za-z]{2,14}#";
if (preg_match($pattern, $subject, $matches)) {
    echo "找到了";
} else {
    echo '没有找到';
}
// 正则表达式的组成部分==================================
echo "<hr>";
// 匹配定界符
// 1) 对内部的定界符用\转义  "#\##"
// 2) 修改定界符为别的符号   "!#!"
$subject = "hello # world";
$pattern = "#\##";
if (preg_match($pattern, $subject)) {
    echo '找到了';
} else {
    echo '没找到';
}

// 练习:统计字符串中有几个换行(\n 不可见原子)
echo "<hr>";
$subject = <<<EOF
        abc
        def
        asd
EOF;
$pattern = "#\n#";
// $pattern = "#a#"; // 普通数字,字母等都是可见原子
if (preg_match_all($pattern, $subject, $matches)) {
    echo "匹配到的换行有" . count($matches[0]) . '个';
}

// 匹配特殊字符,例如{}
echo "<hr>";
$subject = "hello {} world";
$pattern = "#{}#";
if (preg_match($pattern, $subject)) {
    echo '找到了';
} else {
    echo '没找到';
}
echo '<hr>';
echo '<hr>';

// 通用字符类
// 1. 匹配数字  \d 表示0-9的一个  \d\d 00-99
// \d 等价于 [0-9]
echo "<hr>";
$subject = "Hello 123 World456";
$pattern = "#\d\d\d#";
$pattern = "#[0-9][0-9][0-9]#";
if (preg_match_all($pattern, $subject, $matches)) {
    echo '找到了';
    var_dump($matches);
} else {
    echo '没找到';
}
// \D 不是数字的一个字符,等价于 [^0-9]
echo "<hr>";
$subject = "Hello 123 World456";
$pattern = "#\D\D\D#";
if (preg_match_all($pattern, $subject, $matches)) {
    echo '找到了';
    var_dump($matches);
} else {
    echo '没找到';
}

// \w ,等价于 [a-zA-Z0-9_]
echo "<hr>";
$subject = "Hello 123 World456";
$pattern = "#\w\w\w#";
if (preg_match_all($pattern, $subject, $matches)) {
    echo '找到了';
    var_dump($matches);
} else {
    echo '没找到';
}
// 自定义原子表
// [012] 匹配012中的某一个
echo "<hr>";
$subject = "Hello 123 World456";
$pattern = "#[01][0-9]#";
if (preg_match_all($pattern, $subject, $matches)) {
    echo '找到了';
    var_dump($matches);
} else {
    echo '没找到';
}

// 原子总结: 可见原子 不可见元素 特殊字符 通用字符 自定义原子表
// 匹配一个时间   20:15:15
echo "<hr>";
$subject = "当前时间为:11:14:20";
$pattern = "#[0-2][0-9]:[0-5][0-9]:[0-5][0-9]#";
if (preg_match_all($pattern, $subject, $matches)) {
    echo '找到了';
    var_dump($matches);
} else {
    echo '没找到';
}

// 元字符
// *  匹配0个或多个前面的原子,等价于{0,}
// 如果是0 表示gogle 如果是1 表示google
echo "<hr>";
$subject = "gooooooogle google gogle ggle";
$pattern = "#goo*gle#";
if (preg_match_all($pattern, $subject, $matches)) {
    echo '找到了';
    var_dump($matches);
} else {
    echo '没找到';
}

// + 匹配1个或多个前面的原子
echo "<hr>";
$subject = "gooooooogle google gogle ggle";
$pattern = "#goo+gle#";
if (preg_match_all($pattern, $subject, $matches)) {
    echo '找到了';
    var_dump($matches);
} else {
    echo '没找到';
}

// ? 匹配0次或1次
echo "<hr>";
$subject = "gooooooogle google gogle ggle";
$pattern = "#goo?gle#";
if (preg_match_all($pattern, $subject, $matches)) {
    echo '找到了';
    var_dump($matches);
} else {
    echo '没找到';
}

// . 匹配换行符以外的任意一个字符
echo "<hr>";
$subject = "gooooooogle google gogle ggle gooagle";
$pattern = "#goo.gle#";
if (preg_match_all($pattern, $subject, $matches)) {
    echo '找到了';
    var_dump($matches);
} else {
    echo '没找到';
}

// | 匹配两个或多个分支选择
echo "<hr>";
$subject = "nice hello toa";
$pattern = "#ni[a-zA-Z]*|to[a-zA-Z]*#";
if (preg_match_all($pattern, $subject, $matches)) {
    echo '找到了';
    var_dump($matches);
} else {
    echo '没找到';
}

// {n} 恰好匹配n次
// {n,} 至少匹配n次
// {n,m} 至少匹配n次至多匹配m次
echo "<hr>";
$subject = "1234a45 67890";
$pattern = "#\d{1,4}\D#";
if (preg_match_all($pattern, $subject, $matches)) {
    echo '找到了';
    var_dump($matches);
} else {
    echo '没找到';
}

// gooogle gooooogle goooooooogle
echo "<hr>";
$subject = "gooogle gooooogle  goooooooogle";
$pattern = "#go{1,5}gle#";
if (preg_match_all($pattern, $subject, $matches)) {
    echo '找到了';
    var_dump($matches);
} else {
    echo '没找到';
}

// 以什么开头,以什么结尾
// 开头 ^
// 结尾 $
echo "<hr>";
$subject = "https://www.baidu.com";
$pattern = "#^http\S{1,}com$#";
if (preg_match_all($pattern, $subject, $matches)) {
    echo '找到了';
    var_dump($matches);
} else {
    echo '没找到';
}

// 爬取网页中的所有图片地址
//echo "<hr>";
//$url = "http://www.tooopen.com/img/87.aspx";
//$htmlContent = file_get_contents($url);
//$subject = $htmlContent;
//$pattern = "#http\S*jpg#";
//if (preg_match_all($pattern, $subject, $matches)) {
//    echo '找到了';
//    var_dump($matches);
//} else {
//    echo '没找到';
//}

// \b 匹配单词边界
echo "<hr>";
$subject = "hello world.hello abchEllo HelloWorld.";
$pattern = "#\bhello\b#i";
if (preg_match_all($pattern, $subject, $matches)) {
    echo '找到了';
    var_dump($matches);
} else {
    echo '没找到';
}

// () 匹配其整体为一个原子
// matches[0] 匹配到的所有内容
// matches[1] 第一个圆括号的所有内容
// matches[2] 第二个圆括号的所有内容
// 爬取网页内的所有图片和图片名称
echo "<hr>";
$url = "http://www.tooopen.com/img/87.aspx";
$htmlContent = file_get_contents($url);
$subject = $htmlContent;
$pattern = "#(http\S*jpg).*alt=\"(\S*)\"#";
if (preg_match_all($pattern, $subject, $matches)) {
    echo '找到了';
    $html = "";
    foreach ($matches[1] as $key => $value) {
        $imgurl = $value;
        $imgname = $matches[2][$key];
        $html .= "<img src='".$imgurl."' alt='".$imgname."'>";
    }
    echo $html;
} else {
    echo '没找到';
}

// 字符簇cu  仅作了解,和\d,\b用法一致
echo "<hr>";
$subject = "hello world 123";
$pattern = "#[[:digit:]]#";
if (preg_match_all($pattern, $subject, $matches)) {
    echo '找到了';
    var_dump($matches);
} else {
    echo '没找到';
}

// 综合练习:将51job中的所有关于php的工作的 工作名称 工作地点 工作薪资爬取下来,放到table中
// http://search.51job.com/jobsearch/search_result.php?fromJs=1&jobarea=000000%2C00&district=000000&funtype=0000&industrytype=00&issuedate=9&providesalary=99&keyword=php&keywordtype=2&curr_page=1&lang=c&stype=1&postchannel=0000&workyear=99&cotype=99&degreefrom=99&jobterm=99&companysize=99&lonlat=0%2C0&radius=-1&ord_field=0&list_type=0&fromType=14&dibiaoid=0&confirmdate=9
// 1.爬取第一页数据
// 2.爬取前100页数据
// 3.显示到table中
// 扩展:以图标展示数据   计算工资的平均值
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <!--1. 正则表达式-->
    <!--1.1 什么是正则表达式-->
    <!--Regular Expression  简称regex-->
    <!--通过正则表达式,可以查找,替换,...操作字符串-->
    <!--2. 正则表达式的组成-->
    <!--定界符 原子 元子符 模式修饰符-->
    <!--面试题:给你一个表达式,问它能做什么功能?-->
    <!--定界符:非字母,非数字,非反斜线,非空白符-->
    <!--原子-->
    <!--元子符-->
    <!--模式修饰符-->
    <body>
    </body>
</html>
