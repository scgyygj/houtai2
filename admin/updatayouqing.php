<?php
error_reporting(E_ALL^E_NOTICE);
header('Content-type:text/html;charset=utf8');
if($_SERVER['REQUEST_METHOD']=='GET'){
    include  '../libs/db.php';
    include  '../libs/function.php';
    $obj=new unit();
    $yid=$_GET['yid'];  //通过点击获取当前栏目的id
    $obj->model='youqing';
    $lanmu=$obj->cateTree(0,$mysql,'cadegory',0,$yid);
    //获取当前栏目的父栏目

    $sql="select * from youqing";
    $data=$mysql->query($sql)->fetch_assoc();
    $ymain=$obj->cateone($mysql,'youqing','yid',"{$yid}",'ymain');
    $yxiao=$obj->cateone($mysql,'youqing','yid',"{$yid}",'yxiao');
    $ychina=$obj->cateone($mysql,'youqing','yid',"{$yid}",'ychina');
    $yeng=$obj->cateone($mysql,'youqing','yid',"{$yid}",'yeng');
    $yimg=$obj->cateone($mysql,'youqing','yid',"{$yid}",'yimg');
    include '../template/admin/updateyouqing.html';
}else{
    include '../libs/db.php';
    include '../libs/function.php';
    $yid=$_POST['yid'];
    $ymain=$_POST['ymain'];
    $yxiao=$_POST['yxiao'];
    $ychina=$_POST['ychina'];
    $yeng=$_POST['yeng'];
    $yimg=$_POST['yimg'];
    $sql="update  youqing set ymain='{$ymain}',yxiao='{$yxiao}',ychina='{$ychina}',yeng='{$yeng}',yimg='{$yimg}' where yid={$yid}";
    $data=$mysql->query($sql);
    if($mysql->affected_rows){
        $message='修改成功';
        $url='showyouqing.php';
        include  'message.html';
    }else{
        $message='删除失败';
        $url='showyouqing.php';
        include  'message.html';
    }
}