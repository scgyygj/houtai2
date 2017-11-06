<?php
include '../libs/db.php';
$cid=$_GET['cid'];
$sql="select * from  stroy where cid=$cid";
//$photo=$mysql->query($sql)->fetch_all(MYSQLI_ASSOC);
$data=$mysql->query($sql)->fetch_all(MYSQLI_ASSOC);
$sql1="select * from cadegory where cid=$cid";
$obj=$mysql->query($sql1)->fetch_assoc();
$page =$obj['page'];
include '../template/index/'.$page;