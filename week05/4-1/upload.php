<?php
$file_name = $_FILES['file']['name'];
$tmp_name = $_FILES['file']['tmp_name'];
//为了安全,要判断文件是不是图片,但是还是不能识别他是不是木马程序
move_uploaded_file($tmp_name, $file_name);


