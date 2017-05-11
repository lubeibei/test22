<?php

if (isset($_POST['code'])) {
    $code = $_POST['code'];
    session_start();
    if ($code == $_SESSION['code']) {
        $array = ['status' => "1"];
        echo json_encode($array);
    } else {
        $array = ['status' => "0"];
        echo json_encode($array);
    }

    exit();
}

ob_clean();
header("content-type:image/png");
//$image = imagecreatefrompng("img.png");
//画布可以用一个图片直接当作画布
//在图片上绘制文字   添加水印
$image = imagecreatetruecolor(100, 40);
//加背景
$whitecolor = imagecolorallocate($image, 255, 255, 255);
imagefill($image, 0, 0, $whitecolor);
//加图片背景
//验证码:
$type = $_GET["type"];
//$numCode = "";
if ($type == 1) {
    //  4纯数字 
    $array = range(0, 9);
} elseif ($type == 2) {
    //  4纯数字+字符
//    $array = array_merge(range("a", "z"), range("A", "Z"), range(0, 9));
} elseif ($type == 3) {
    //  4纯文字
//    $array = explode(",", "今,天,星,期,五,蜜,谈,大,师,法");
}
$code = "";
for ($i = 0; $i < 4; $i++) {
    $content = $array[rand(0, count($array) - 1)];
    $code .= $content;
    $color = imagecolorallocate($image, rand(0, 255), rand(0, 255), rand(0, 255));
    imagettftext($image, rand(25, 30), rand(-20, 20), 20 + 15 * $i, 30, $color, "FZSTK.TTF", $content);
    //干扰项:点   线段  弧线
}

//存储
session_start();
$_SESSION['code'] = $code;
for ($i = 0; $i < 50; $i++) {
    $color = imagecolorallocate($image, rand(0, 255), rand(0, 255), rand(0, 255));
    imagesetpixel($image, rand(0, 100), rand(0, 40), $color);
}
for ($i = 0; $i < 5; $i++) {
    $color = imagecolorallocate($image, rand(0, 255), rand(0, 255), rand(0, 255));
    $x1 = rand(10, 80);
    $y1 = rand(10, 35);
    imageline($image, $x1, $y1, $x1 + 50, $y1 + rand(-10, 10), $color);
}
for ($i = 0; $i < 1; $i++) {
    $color = imagecolorallocate($image, rand(0, 255), rand(0, 255), rand(0, 255));
    imagearc($image, 60, 20, 100, 40, -90, 90, $color);
}
//imagestring($image, 20, 20, 10, "1234", $color);
imagepng($image);
imagedestroy($image);
?>