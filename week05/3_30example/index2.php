<?php
//爬取网页内的所有图片和图片名称
echo "<hr>";
$url = "http://www.tooopen.com/img/87.aspx";
$htmlContent = file_get_contents($url);
$subject = $htmlContent;
$pattern = "#(http\S*jpg).*alt=\"(\S*)\"#";
if (preg_match_all($pattern, $subject, $matches)) {
    echo '找到了';
    $html = "";
    var_dump($matches);
    foreach ($matches[1] as $key => $value){
        $imgurl = $value;
        $imgname = $matches[2][$key];
        $html .= "<img src='.$imgurl.' alt='.$imgname.'>";
    }
    echo $html;   
} else {
    echo '没找到';
}
?>
