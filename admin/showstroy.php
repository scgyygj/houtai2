<?php
include '../libs/db.php';
$sql="select * from stroy";
$data=$mysql->query($sql)->fetch_all(MYSQLI_ASSOC);
$option='';
foreach ($data as $index=>$value){
    $option.="<tr>
       <td>{$value['sid']}</td>
       <td><img src='{$value['strtou']}' alt='' style='width: 100px;height: 100px;'></td>
       <td>{$value['strtitle']}</td>
       <td><p>{$value['strcent']}</p></td>
       <td><img src='{$value['qian']}' alt='' style='width: 100px;height: 100px;'></td>
       <td><img src='{$value['hou']}' alt='' style='width: 100px;height: 100px;'></td>
       <td><img src='{$value['top']}' alt='' style='width: 100px;height: 100px;'></td>
       <td><img src='{$value['bottom']}' alt='' style='width: 100px;height: 100px;'></td>
       <td><img src='{$value['leftpho']}' alt='' style='width: 100px;height: 100px;'></td>
       <td><img src='{$value['rightpho']}' alt='' style='width: 100px;height: 100px;'></td>
       <td>
       <a href=\"deletestroy.php?sid={$value['sid']}\">删除</a>
       <a href=\"updatayouqing.php?sid={$value['sid']}\">更改</a>
</td>
</tr>";
}

include '../template/admin/showstroy.html';
?>