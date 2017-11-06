<?php
include '../libs/db.php';
include '../libs/function.php';
$yid=$_GET['yid'];
$sql="delete from youqing where yid={$yid}";
$data=$mysql->query($sql);
if($mysql->affected_rows){
    $message='删除成功';
    $url='showyouqing.php';
    include 'message.html';
}else{
    $message='删除失败';
    $url='showyouqing.php';
    include 'message.html';
}