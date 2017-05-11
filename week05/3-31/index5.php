<?php
//    水印图片  把一个图片放在一张图片上
//    bool imagecopyresampled ( resource dstimage,resourcesrc_image , int dstx,intdst_y , int srcx,intsrc_y , int dstw,intdst_h , int srcw,intsrc_h )
//    $dst_image：新建的图片
//    $src_image：需要载入的图片
//    $dst_x：设定需要载入的图片在新图中的x坐标
//    $dst_y：设定需要载入的图片在新图中的y坐标
//    $src_x：设定载入图片要载入的区域x坐标
//    $src_y：设定载入图片要载入的区域y坐标
//    $dst_w：设定载入的原图的宽度（在此设置缩放）
//    $dst_h：设定载入的原图的高度（在此设置缩放）
//    $src_w：原图要载入的宽度
//    $src_h：原图要载入的高度
//参数1:大图
// 参数2:小图
// 参数3,4 小图在大图的位置
// 参数5,6 从哪个点开始截取小图内容
// 参数7,8 小图在大图上的宽高
// 参数9,10 截取小图内容的宽高
// imagecopyresampled($dst_image, $src_image, $dst_x, $dst_y, $src_x, $src_y, $dst_w, $dst_h, $src_w, $src_h);
// 把src_image的一部分放到dst_image上
$src_image = imagecreatefromjpeg("11.jpg");
$src_w = imagesx($src_image);
$src_h = imagesy($src_image);
$dst_image = imagecreatefromjpeg("yanjing.jpg");
$dst_w = imagesx($dst_image)/ 4;
$dst_h = imagesy($dst_image)/4;


imagecopyresampled($dst_image, $src_image,$_w , $_h, 0, 0,$dst_w, $dst_h, $src_w, $src_h);
imagejpeg($dst_image, "yanjing2.png");

//缩略图
//把原来的图变小
//$src_image = imagecreatefromjpeg("yanjing.jpg");
//$src_w = imagesx($src_image);
//$src_h = imagesx($src_image);
//$dst_image = imagecreate($src_w/2,$src_h/2 );
//$dst_w = $src_w/2;
//$dst_h = $src_h/2;
//imagecopyresized($dst_image, $src_image, 0, 0, 0, 0, $dst_w, $dst_h, $src_w, $src_h);
//imagejpeg($dst_image,"thumb_md.jpg");
//
//
//$dst_image = imagecreate($src_w/4,$src_h/4 );
//$dst_w = $src_w/4;
//$dst_h = $src_h/4;
//imagecopyresized($dst_image, $src_image, 0, 0, 0, 0, $dst_w, $dst_h, $src_w, $src_h);
//imagejpeg($dst_image,"thumb_sm.jpg");
//;
//
//?>