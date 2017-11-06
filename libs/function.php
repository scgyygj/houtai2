<?php
//参数
//$pid  父级id
//$mysql  连接数据库   $db 资源
//$table    表
//$flag    层级    几级栏目（从顶层栏目开始找，父id为0）

 class unit{
    function __construct()   //构造函数，用来定义属性。
    {
        $this->str = '';     //定义属性
        $this->parentid=null;
        $this->model='';
    }
   function cateTree($pid,$db,$table,$flag,$current=null){
       $flag++;
       //查找父id
      if($current && $this->model='cadegory'){
          $sql="select pid from {$table} where cid={$current} ";
          $data=$db->query($sql)->fetch_assoc();
          $this->parentid=$data['pid'];
      }else if($current &&  $this->model='youqing'){
          $sql="select cid from {$table} where yid={$current} ";
          $data=$db->query($sql)->fetch_assoc();
          $this->parentid=$data['cid'];
      }else if($current && $this->model='stroy' ){
          $sql="select cid from {$table} where sid={$current} ";
          $data=$db->query($sql)->fetch_assoc();
          $this->parentid=$data['cid'];
      }
        $sql="select * from {$table} where pid={$pid}";
        $data=$db->query($sql);
        while($row=$data->fetch_assoc()){   //	从结果集中取得一行作为关联数组,一维数组。
//            字符串拼接，最终输出在页面中。
            if($row['cid']==$this->parentid){
                $this->str.="<option value={$row['cid']} selected> $flag{$row['cname']}</option>";
            }
            $this->str.="<option value={$row['cid']}> $flag{$row['cname']}</option>";
            $this->cateTree($row['cid'],$db,$table,$flag,$this->parentid);  //找当前栏目的子栏目，当前栏目的id做为父id.
        }
        return $this->str;
   }

   //查看
  function cateTale($db,$table){
       $sql="select * from $table";
       $data=$db->query($sql)->fetch_all(MYSQLI_ASSOC);
       foreach ($data as $index=>$value){
           $this->str.="<tr>
            <td>{$value['cid']}</td>             
            <td>{$value['cname']}</td>
            <td>{$value['pid']}</td>
            <td><a href=\"deleteCategoty.php?cid={$value['cid']}\">删除</a>
            <a href=\"updateCate.php?cid={$value['cid']}\">修改</a></td>
            </tr>
            ";
       }
      return $this->str;
  }
  //youqing
     function cateyouqing($db,$table){
         $sql="select * from $table";
         $data=$db->query($sql)->fetch_all(MYSQLI_ASSOC);
         foreach ($data as $index=>$value){
             $this->str.="<tr>
            <td>{$value['yid']}</td>
     <td><p>{$value['ymain']}</p></td>
     <td>{$value['yxiao']}</td>
     <td>{$value['ychina']}</td>
     <td>{$value['yeng']}</td>
     <td><img src='{$value['yimg']}' alt='' style='width: 100px;height: 100px;'></td> 
     <td><a href=\"deleteyouqing.php?yid={$value['yid']}\">删除</a>
         <a href=\"updatayouqing.php?yid={$value['yid']}\">修改</a></td>    
     </tr>
     ";
         }
         return $this->str;
     }
//获取一个属性
  function cateone($db,$table,$zid,$id,$attr){
      $sql="select $attr from $table where $zid=$id";
      $data=$db->query($sql)->fetch_assoc();
      $cname=$data[$attr];
      return $cname;
  }
}
