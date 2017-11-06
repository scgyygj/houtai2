<?php
if($_SERVER['REQUEST_METHOD']=='GET'){
include '../libs/db.php';
include '../libs/function.php';
$obj=new unit();
$option=$obj->cateyouqing($mysql,'youqing');
include '../template/admin/showyouqing.html';
}


