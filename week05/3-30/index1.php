<?php
//正则表达式的作用
//正则表达式默认采用贪婪模式:尽可能多的匹配
//.*?  ?可以把贪婪模式转换为懒惰匹配
//##u  懒惰匹配
//练习1:
$subject = "2017-03-30 9:16 2017-03-30 9:16";
$pattern = "#(\d{4})-(\d{2})-(\d{2}) (\d{1,2}):(\d{2})#";
$replace = "$1年$2月$3日 $4时$5分";
$result = preg_replace($pattern, $replace, $subject);
echo $result;
//练习2:替换表情
$subject = "今天真困<face>sm</face> 我都快睡了<face>sm</face> ";
$pattern = "#<face>(.*?)</face>#";
$replace = "<img src='$1.png'>";
$result = preg_replace($pattern, $replace, $subject);
echo $result;
//???????????????????????????????????????????????????????????????????
// 练习:请将文章中的毛泽东 江泽民 习近平 张飞 换为 毛*东 江*民 习*平
echo "<hr>";
$subject = "今天毛 泽 东邀请江泽民的同事习近平去看戏Fuck";
$pattern = "#(毛\s*泽\s*东|江\s*泽\s*民|习\s*近\s*平|Fuck)#";
$replacement = "$1";
$result = preg_replace_callback($pattern, function($matches) {
    $s = $matches[1];
    $s = str_replace(" ", "", $s);
    if (preg_match("/[a-zA-Z]/", $s) == false) {
        $res = substr_replace($s, "*", 3, 3);
    } else {
        $res = substr_replace($s, "*", 1, 1);
    }
    return $res;
}, $subject);
echo $result;

//函数 preg_grep():对数组中的数据进行筛选,得到一个新数组
$pattern = " #^[1-9]?\d{0,}|0$#";
$input = array("hello","aba",3,true,3.15);
$result = preg_grep($pattern, $input);
var_dump($input);
//preg_split():分割
// preg_quote 引用,转义
// ello World \<a\>123\</a\>
// 当搜集用户信息/展示用户信息的时候,为了避免"跨站脚本攻击",需要对内容的特殊字符做转义
echo "<hr>";
$subject = "Hello World <h2>123</h2>";
var_dump($subject);
$result = preg_quote($subject);
//转义后把"\"转义成空格,在输出的话,还是和没转义前的效果一样
var_dump($result);


$result = filter_input(INPUT_GET,"email", FILTER_VALIDATE_EMAIL);
var_dump($result);
if($result === NULL){
    echo '邮箱格式不匹配';
}else{
    echo '邮箱格式格式可以使用';
}

echo '<hr>';
//匹配ip地址
$result = filter_input(INPUT_GET,"ip",FILTER_VALIDATE_IP );
var_dump($result);
if($result === NULL){
    echo 'ip格式不匹配';
}else{
    echo 'ip格式格式可以使用';
}
//(?<名字>表达式)
$str = "hello 123 world  ";


?>