<!--1. 开启GD-->
<!--打开php.ini,找到extension=php_gd2.dll,将前面的;去掉,重启apache-->
<!--2. 验证GD是否开启成功-->
<?php
// phpinfo():包含php的相关信息
// phpinfo();

// 判断"工具"是否可以加载  常用
// extension:扩展
// 成功返回1.失败返回空
// echo extension_loaded("gd");

// var_dump(gd_info());
?>
<!--3. 使用GD的五个步骤-->
<!--0) 修改内容类型:默认text/html-->
<!--1) 创建画布-->
<!--2) 创建颜色-->
<!--3) 绘画:点,线,字,矩形,圆形,弧线....-->
<!--4) 显示到屏幕上-->
<!--5) 销毁画布-->
<?php
ob_clean();
header("Content-type:image/png");

// image:图片  create:创建 true:真 color:颜色
$image = imagecreatetruecolor(300, 300);

// [[People alloc] init]; 创建一个人类并初始化
// allocate:分配
// 参数1:画布
// 参数234 红绿蓝
$color = imagecolorallocate($image, 100, 200, 150);
// alpha:通道,透明度
// imagecolorallocatealpha($image, $red, $green, $blue, $alpha)

// 绘制单个字符(一个:字母,符号,数字)
// 参数2:字体,1-5
//imagechar($image, 1, 150, 150, 'Y', $color);
imagecharup($image, 1, 150, 150, 'Y', $color);
// 显示到屏幕上
// imagepng($image);
// 保存为图片
imagepng($image);

// 销毁画布
imagedestroy($image);
?>
