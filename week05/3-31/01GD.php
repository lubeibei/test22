
        <?php
//        print_r(phpinfo());
//        phpinfo()
//        extension:扩展
//        echo    extension_loaded("gd");
//        print_r(gd_info());
        ?>
   <?php
//   0:修改内容类型(默认text/html)
//  1: 创建画布
ob_clean();
header("content-type:image/png;charset=utf-8");
$image = imagecreatetruecolor(300, 300);
//2:创建颜色(两种函数)
//allocate:分配,指定
$color = imagecolorallocate($image, 100, 200, 150);
//alpha:透明度
//imagecolorallocatealpha($image, $red, $green, $blue, $alpha)
//3 绘制单个字符(一个:字母数字符号)
//imagechar($image, $font, $x, $y, $c, $color)
//参数2:字体大小1-5
imagechar($image, 30, 150,150, "Y", $color);
//4(1)直接显示到屏幕上
imagepng($image);
//4(2)保存为图片
//imagepng($image, "1.png");

//5:销毁画布(可省略)
imagedestroy();

$image = imagecreatetruecolor(100,100);
$color = imagecolorallocate($image, 200, 0, 233);
imagecharup($image, 5, 25, 25, '8', $color);
imagepng($image, "2.png");
imagedestroy($image);
   
   
   ?>