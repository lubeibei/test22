<?php
//爬取51job
// 综合练习:将51job中的所有关于php的工作的 工作名称 工作地点 工作薪资爬取下来,放到table中
// http://search.51job.com/jobsearch/search_result.php?fromJs=1&jobarea=000000%2C00&district=000000&funtype=0000&industrytype=00&issuedate=9&providesalary=99&keyword=php&keywordtype=2&curr_page=1&lang=c&stype=1&postchannel=0000&workyear=99&cotype=99&degreefrom=99&jobterm=99&companysize=99&lonlat=0%2C0&radius=-1&ord_field=0&list_type=0&fromType=14&dibiaoid=0&confirmdate=9
// 1.爬取第一页数据
// 2.爬取前100页数据
// 3.显示到table中
// 扩展:以图表展示数据   计算工资的平均值

header("Content-type: textml; charset=gbk");
//header("Content-type: textml; charset=utf_8");

//如果出现乱码,则加一个函数处理一下gbk2utf8  
for ($i = 1; $i < 10; $i++) {
    $url = "http://search.51job.com/jobsearch/search_result.php?fromJs=1&jobarea=000000%2C00&district=000000&funtype=0000&industrytype=00&issuedate=9&providesalary=99&keyword=php&keywordtype=2&curr_page=" . $i . "&lang=c&stype=1&postchannel=0000&workyear=99&cotype=99&degreefrom=99&jobterm=99&companysize=99&lonlat=0%2C0&radius=-1&ord_field=0&list_type=0&fromType=14&dibiaoid=0&confirmdate=9";
    $content = file_get_contents($url);
//    把代码中的换行符  换成空格
//    $content = str_replace("\n", "", $content);
    $pattern = '#<p class="t1 ">.*?<a.*?>(.*?)</a>.*?</p>.*?<span class="t2"><a.*?>(.*?)</a></span>.*?<span class="t3">(.*?)</span>.*?<span class="t4">(.*?)</span>.*?<span class="t5">(.*?)</span>#s';
   
    if (preg_match_all($pattern, $content, $matches)) {
//        var_dump($matches[4]);
        echo "<table border='1' cellspacing='0'>";     
        foreach ($matches[1] as $key => $value) { 
            echo "<tr>";
            echo "<td>".$matches[1][$key] ."</td>";
            echo "<td>".$matches[2][$key] ."</td>";
            echo "<td>".$matches[3][$key] ."</td>";
            echo "<td>".$matches[4][$key] ."</td>";
            echo "<td>".$matches[5][$key] ."</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "no find";
    }
}




?>
