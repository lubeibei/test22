<?php
ob_clean();
header("content-type:image/png");
session_start();
if (isset()&&$_SESSION) {
    
}
$image = imagecreatetruecolor(100, 40);
$array = range(0,9);
$codeStr = "";
for($i = 0;$i < 4;$i++){
    $str =$array[rand(0,  count($array)-1)];
    $color =  imagecolorallocate($image,  rand(0, 255), rand(0, 255), rand(0, 255));
    imagettftext($image, rand(20,35),  rand(-20,20), 25+$i, 30, $color, "FZSTK.TTF", $text);
    $codeStr .=$str;//拼在一起,然后存储在session中
}
$_SESSION($codeStr);
imagepng($image);
imagedestroy($image);
?> 