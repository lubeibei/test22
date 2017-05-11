<?php
ob_clean();
header("Content-type:image/png");
$image = imagecreatetruecolor(100, 40);
$color = imagecolorallocate($image, 255, 0, 0);
$type = $_GET['type'];
$numCode = "";
$array = [];
if ($type == 1) {
    $array = range(0, 9);
} else if ($type == 2) {
    $array = array_merge(range("a", "z"), range("A", "Z"), range(0, 9));
} else if ($type == 3) {
    $str = "今,天,星,期,五,明,天,星,期,六,后,天,要,放,假";
    $array = explode(",", $str);
}
for ($i = 0; $i < 4; $i++) {
    $content = $array[rand(0, count($array) - 1)];
    $numCode .= $content;
}
$numCode = imagettftext($image, 30, 10, 20, 40, $color, "SIMLI.TTF", $numCode);
imagepng($image);
imagedestroy($image);

// 想一想:如何修改验证码的背景色为蓝色
// 如何修改验证码的背景为一张图片
?>
