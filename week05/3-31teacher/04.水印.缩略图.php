<?php

// 缩略图
// 商城的货物展示
// 大(原图)    中      小
// 900*600  450*300 300*200
$src_image = imagecreatefromjpeg("goods.jpg");
$src_w = imagesx($src_image);
$src_h = imagesy($src_image);
$dst_image = imagecreate($src_w / 2, $src_h / 2);
$dst_w = $src_w / 2;
$dst_h = $src_h / 2;
imagecopyresized($dst_image, $src_image, 0, 0, 0, 0, $dst_w, $dst_h, $src_w, $src_h);
imagejpeg($dst_image, "thumb_md_goods.jpg");
$dst_image = imagecreate($src_w / 4, $src_h / 4);
$dst_w = $src_w / 4;
$dst_h = $src_h / 4;
imagecopyresized($dst_image, $src_image, 0, 0, 0, 0, $dst_w, $dst_h, $src_w, $src_h);
imagejpeg($dst_image, "thumb_sm_goods.jpg");

// 图片水印
// 把src_image的一部分放到dst_image上
$src_image = imagecreatefrompng("default.png");
$src_w = imagesx($src_image);
$src_h = imagesy($src_image);

$dst_image = imagecreatefromjpeg("goods.jpg");
$dst_width = imagesx($dst_image);
$dst_height = imagesy($dst_image);
$dst_w = $src_w;
$dst_h = $src_h;
$dst_x = ($dst_width - $dst_w) / 2;
$dst_y = ($dst_height - $dst_h) / 2;
// 参数1:大图
// 参数2:小图
// 参数3,4 小图在大图的位置
// 参数5,6 从哪个点开始截取小图内容
// 参数7,8 小图在大图上的宽高
// 参数9,10 截取小图内容的宽高
imagecopyresampled($dst_image, $src_image, $dst_x, $dst_y, 0, 0, $dst_w, $dst_h, $src_w, $src_h);
imagejpeg($dst_image, "water_goods.jpg");
?>