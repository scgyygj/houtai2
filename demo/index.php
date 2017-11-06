<?php
//is_uploaded_file($_FILES['img']['tmp-name']  判断是否上传文件
$file=$_FILES['file'];
if(is_uploaded_file($_FILES['img']['tmp_name'])){   //tmp_name类型，名字
    //file_exists('upload'判断是否有upload这个文件夹  没有创建
    if(!file_exists('upload')) {
        mkdir('upload');   //创建upload文件夹
    }
    $path='upload/'.date('y-m-d');   //用当前时间作为文件夹名
    if(!file_exists($path)){
        mkdir($path);
    }
    $imgpath=$path.'/'.$file['name'];
    move_uploaded_file($_FILES['img']['tmp_name'],$imgpath);
    $src='/project/demo/'.$imgpath;

    echo ("<img src={$src}>");
}