<?php

////爬取网页内的所有图片和图片名称
//echo "<hr>";
//$url = "http://www.tooopen.com/img/87.aspx";
//$htmlContent = file_get_contents($url);
//$subject = $htmlContent;
//$pattern = "#(http\S*jpg).*alt=\"(\S*)\"#";
//if (preg_match_all($pattern, $subject, $matches)) {
//    echo '找到了';
//    $html = "";
//    var_dump($matches);
//    foreach ($matches[1] as $key => $value){
//        $imgurl = $value;
//        $imgname = $matches[2][$key];
//        $html .= "<img src='.$imgurl.' alt='.$imgname.'>";
//    }
//    echo $html;   
//} else {
//    echo '没找到';
//}
//爬取51job
header("Content-type: textml; charset=gbk");
//header("Content-type: textml; charset=utf_8");

//如果出现乱码,则加一个函数处理一下gbk2utf8  
for ($i = 1; $i < 10; $i++) {
    $url = "http://search.51job.com/jobsearch/search_result.php?fromJs=1&jobarea=000000%2C00&district=000000&funtype=0000&industrytype=00&issuedate=9&providesalary=99&keyword=php&keywordtype=2&curr_page=" . $i . "&lang=c&stype=1&postchannel=0000&workyear=99&cotype=99&degreefrom=99&jobterm=99&companysize=99&lonlat=0%2C0&radius=-1&ord_field=0&list_type=0&fromType=14&dibiaoid=0&confirmdate=9";
    $content = file_get_contents($url);
//    把代码中的换行符  换成空格
//    $content = str_replace("\n", "", $content);
    $pattern = '#<p class="t1 ">.*?<a.*?>(.*?)</a>.*?</p>.*?<span class="t2"><a.*?>(.*?)</a></span>.*?<span class="t3">(.*?)</span>.*?<span class="t4">(.*?)</span>.*?<span class="t5">(.*?)</span>#s';
    $sum1 = 0;
    $sum2 = 0;
    if (preg_match_all($pattern, $content, $matches)) {
//        var_dump($matches[4]);
        foreach ($matches[4] as $key => $value) {
//           把 0.8-1.6万/月 里面的字符串0.8-1.6匹配出来,再把字符串分割成数组  
//           数组的第一个元素的和的平均数是每个月的最低工资,第二个元素的和的平均数则是月平均最高工资
            $str = $matches[4][$key];
            $pattern = "#[0-9]\.?[0-9]?-[0-9]\.?[0-9]?#";
            if (preg_match_all($pattern, $str, $matches1)) {
//            echo 'YES  fine ';
//    var_dump($matches);
                $str1fanwei = $matches1[0][0];
//    var_dump(explode("-", $str));
                $array1[0] = explode("-", $str1fanwei)[0];
                $sum1 += $array1[0]; 
                $array1[1] = explode("-", $str1fanwei)[1];
                $sum2 += $array1[1];
//                var_dump($array1);
            } else {
                echo '没找到';
            }
        }
        echo $sum1;
        echo "<hr>";
        echo $sum2;
//        var_dump($matches);
   
//        echo "<table border='1' cellspacing='0'>";     
//        foreach ($matches[1] as $key => $value) { 
//            echo "<tr>";
//            echo "<td>".$matches[1][$key] ."</td>";
//            echo "<td>".$matches[2][$key] ."</td>";
//            echo "<td>".$matches[3][$key] ."</td>";
//            echo "<td>".$matches[4][$key] ."</td>";
//            echo "<td>".$matches[5][$key] ."</td>";
//            echo "</tr>";
//        }
//        echo "</table>";
    } else {
        echo "no find";
    }
}
?>