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
header("Content-type:image/png");
$image = imagecreatefrompng("default.png");
$image = imagecreatetruecolor(100, 40);
$whiteColor = imagecolorallocate($image, 255, 255, 255);
imagefill($image, 0, 0, $whiteColor);
$type = $_GET['type'];
$array = [];
if ($type == 1) {
    $array = range(0, 9);
} else if ($type == 2) {
    $array = array_merge(range("a", "z"), range("A", "Z"), range(0, 9));
} else if ($type == 3) {
    $str = "今,天,星,期,五,明,天,星,期,六,后,天,要,放,假";
    $array = explode(",", $str);
}
$code = "";
for ($i = 0; $i < 4; $i++) {
    $content = $array[rand(0, count($array) - 1)];
    $code .= $content;
    $color = imagecolorallocate($image, rand(0, 255), rand(0, 255), rand(0, 255));
    imagettftext($image, rand(10, 20), rand(-20, 20), 20 + 15 * $i, 30, $color, "SIMLI.TTF", $content);
}
session_start();
$_SESSION['code'] = $code;



// 干扰项:点,线段,弧线
for ($i = 0; $i < 50; $i++) {
    $color = imagecolorallocate($image, rand(0, 255), rand(0, 255), rand(0, 255));
    imagesetpixel($image, rand(0, 100), rand(0, 40), $color);
}
for ($i = 0; $i < 5; $i++) {
    $color = imagecolorallocate($image, rand(0, 255), rand(0, 255), rand(0, 255));
    $x1 = rand(10, 80);
    $y1 = rand(10, 35);
    imageline($image, $x1, $y1, $x1 + 10, $y1 + rand(-10, 10), $color);
}
for ($i = 0; $i < 1; $i++) {
    $color = imagecolorallocate($image, rand(0, 255), rand(0, 255), rand(0, 255));
    imagearc($image, 50, 20, 100, 40, -90, 90, $color);
}
imagepng($image);
imagedestroy($image);

// 想一想:如何修改验证码的背景色为蓝色 imagefill
// 如何修改验证码的背景为一张图片 imagecreatefrompng
// 在图片上绘制文字  --->  添加水印
// 版权
?>
