<?php
header("content-type:text/html;charset=utf-8");
// 正前瞻 ?= hello后面是world
$subject = 'helloworld';
$pattern = '#hello(?=world)#';
preg_match($pattern, $subject, $matches);
print_r($matches);
echo "<hr>";
// 反前瞻 ?! hello后面不是world
$subject = 'hello11world';
$pattern = '#hello(?!world)#';
preg_match($pattern, $subject, $matches);
print_r($matches);
echo "<hr>";
// 正后顾?<=  world前是hello的
$subject = 'helloworld';
$pattern = '#(?<=hello)world#';
preg_match($pattern, $subject, $matches);
print_r($matches);
echo "<hr>";
// 反后顾 ?<!  world的前不是hello的
$subject = 'hellworld';
$pattern = '#(?<!hello)world#';
preg_match($pattern, $subject, $matches);
print_r($matches);
echo "<hr>";
?>