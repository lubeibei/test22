<?php
$str = "0.8-1万/月  0.8-1.6万/月";
$pattern = "#[0-9]\.?[0-9]?-[0-9]\.?[0-9]?#";
if (preg_match_all($pattern, $str, $matches)) {
    echo '找到了';
    var_dump($matches);
    $str1 = $matches[0][0];
    $str2 = $matches[0][1];

    echo "<hr>";
//    var_dump(explode("-", $str));
    $array1[0] = explode("-", $str1)[0];
    $array1[1] = explode("-", $str1)[1];
    var_dump($array1);
    echo "<hr>";
    $array2[0] = explode("-", $str2)[0];
    $array2[1] = explode("-", $str2)[1];
    var_dump($array2);
} else {
    echo '没找到';
}




//爬取任意网页的数据 获取href ,img 和src alt
$url = "http://www.quanjing.com/feature/travel.html";
$content = file_get_contents($url);
$pattern = '#<a href="(.*?)".*?><img  src="(.*?)" alt="(.*?)"/></a>#s';
if (preg_match_all($pattern, $content, $matches)) {
    var_dump($matches[1]);
}






?>