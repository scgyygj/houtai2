<?php
include '../libs/db.php';
$sid=$_GET['sid'];
$sql="delete from stroy where sid={$sid}";
$data=$mysql->query($sql);
if($mysql->affected_rows){
    $message='删除成功';
    $url='showstroy.php';
    include 'message.html';
}else{
    $message='删除失败';
    $url='showstroy.php';
    include 'message.html';
}
