<?php
header('Content-type:text/html;charset=utf8');
if($_SERVER['REQUEST_METHOD']=='GET'){
    include '../libs/db.php';
    include '../libs/function.php';
    $obj=new unit();
    $option=$obj->cateTree(0,$mysql,'cadegory',0);
    include  '../template/admin/youqing.html';
}
else{
    include '../libs/db.php';
    $yid=$_POST['yid'];
    $ymain=$_POST['ymain'];
    $yxiao=$_POST['yxiao'];
    $ychina=$_POST['ychina'];
    $yeng=$_POST['yeng'];
    $src='';
    //上传文件
    $file=$_FILES['yimg'];
    if(is_uploaded_file($file['tmp_name'])){
        if(!file_exists('../static/upload')){
            mkdir('../static/upload',0777,true);
        }
        $path='../static/upload/'.date('y-m-d');

        if(!file_exists($path)){
            mkdir($path,0777,true);
        }
        $imgpath=$path.'/'.$file['name'];
        move_uploaded_file($file['tmp_name'],$imgpath);
        $src='/project/'.substr($imgpath,3);
    }
    $sql="insert into youqing (ymain,yxiao,ychina,yeng,yimg) value ('{$ymain}','{$yxiao}','{$ychina}','{$yeng}','{$src}')";
    $mysql->query($sql);
    if($mysql->affected_rows){         //	取得前一次 MySQL 操作所影响的记录行数。
        echo '<script>alert(succes)</script>';
        $message='栏目插入成功';
        $url='showCategory.php';
    }
    else{
        $message='栏目插入失败';
        $url='addCategory.php';
    }
    include 'message.html';
}