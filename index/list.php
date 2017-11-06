<?php
//include 'header.php';
include '../libs/db.php';
$cid=$_GET['cid'];
$sql="select * from cadegory where cid={$cid}";
$data=$mysql->query($sql)->fetch_assoc();
$page=$data['page'];
$sql1="select * from cadegory where pid={$cid}";
$ydaohang=$mysql->query($sql1)->fetch_all(MYSQLI_ASSOC);
$sql2="select * from stroy where zhanshiwei=1";
$data2=$mysql->query($sql2)->fetch_all(MYSQLI_ASSOC);
$sql3="select * from stroy order by  zhanshiwei=2  desc limit 0,1";
$data3=$mysql->query($sql3)->fetch_all(MYSQLI_ASSOC);
include '../template/index/'.$page;