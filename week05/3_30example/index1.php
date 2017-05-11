<?php

//练习3:爬取任意网页的数据 获取href ,img 和src alt
$url = "http://www.quanjing.com/feature/travel.html";
$content = file_get_contents($url);
$pattern = '#<a href="(.*?)".*?><img  src="(.*?)" alt="(.*?)"/></a>#s';
if (preg_match_all($pattern, $content, $matches)) {
    var_dump($matches[1]);
}
?>