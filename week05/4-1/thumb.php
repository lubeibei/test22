<?php
//上传文件
var_dump($_FILES);
$file_name = $_FILES['img']['name'];
$tmp_name = $_FILES['img']['tem_name'];

//move_uploaded_file($tmp_name, "headers".$file_name);//成功返回true
if(move_uploaded_file($tmp_name, "headers".$file_name)){
    $array['status'] = 1;
    $array['msg'] = "上传成功!";
    echo json_encode($array);
//    上传成功,则生成缩略图
    $src = imagecopyresampled($dst_image, $src_image, $dst_x, $dst_y, $src_x, $src_y, $dst_w, $dst_h, $src_w, $src_h);
    
    
    
    
}else{
    $array['status'] =0;
    $array['msg'] = "上传失败!";
    echo json_encode($array);
}





?>