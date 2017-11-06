<?php
   header('Content-type:text/html;charset=utf8');
   if($_SERVER['REQUEST_METHOD']='GET') {
       include '../libs/db.php';
       include '../libs/function.php';
       $obj = new unit();
       $sid = $_GET['sid'];
       $this->model = 'stroy';
       $lanmu = $obj->cateTree(0, $mysql, 'cadegory', 0, $yid);

       $strtou=$obj->cateone($mysql,'stroy','sid',"{$sid}",'strtou');
       $strtitle=$obj->cateone($mysql,'stroy','sid',"{$sid}",'strtitle');
       $strcent=$obj->cateone($mysql,'stroy','sid',"{$sid}",'strcent');
       $qian=$obj->cateone($mysql,'stroy','sid',"{$sid}",'qian');
       $hou=$obj->cateone($mysql,'stroy','sid',"{$sid}",'hou');
       $leftpho=$obj->cateone($mysql,'stroy','sid',"{$sid}",'leftpho');
       $rightpho=$obj->cateone($mysql,'stroy','sid',"{$sid}",'rightpho');
       $top=$obj->cateone($mysql,'stroy','sid',"{$sid}",'top');
       $bottom=$obj->cateone($mysql,'stroy','sid',"{$sid}",'bottom');
       include '../template/admin/updatestroy.html';
   }
   else{
  include '../libs/db.php';
  $strtitle=$_POST['strtitle'];
  $strcent=$_POST['strcent'];
       //上传头像
       $file=$_FILES['strtou'];
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
       //左
       $leftpho=$_FILES['leftpho'];
       if(is_uploaded_file($leftpho['tmp_name'])){
           if(!file_exists('../static/upload')){
               mkdir('../static/upload',0777,true);
           }
           $path='../static/upload/'.date('y-m-d');

           if(!file_exists($path)){
               mkdir($path,0777,true);
           }
           $imgpath=$path.'/'.$leftpho['name'];
           move_uploaded_file($leftpho['tmp_name'],$imgpath);
           $srcleft='/project/'.substr($imgpath,3);
       }

       //右
       $rightpho=$_FILES['rightpho'];
       if(is_uploaded_file($rightpho['tmp_name'])){
           if(!file_exists('../static/upload')){
               mkdir('../static/upload',0777,true);
           }
           $path='../static/upload/'.date('y-m-d');

           if(!file_exists($path)){
               mkdir($path,0777,true);
           }
           $imgpath=$path.'/'.$rightpho['name'];
           move_uploaded_file($rightpho['tmp_name'],$imgpath);
           $srcright='/project/'.substr($imgpath,3);
       }

       //上
       $top=$_FILES['top'];
       if(is_uploaded_file($top['tmp_name'])){
           if(!file_exists('../static/upload')){
               mkdir('../static/upload',0777,true);
           }
           $path='../static/upload/'.date('y-m-d');

           if(!file_exists($path)){
               mkdir($path,0777,true);
           }
           $imgpath=$path.'/'.$top['name'];
           move_uploaded_file($top['tmp_name'],$imgpath);
           $srctop='/project/'.substr($imgpath,3);
       }

       //下
       $bottom=$_FILES['bottom'];
       if(is_uploaded_file($bottom['tmp_name'])){
           if(!file_exists('../static/upload')){
               mkdir('../static/upload',0777,true);
           }
           $path='../static/upload/'.date('y-m-d');

           if(!file_exists($path)){
               mkdir($path,0777,true);
           }
           $imgpath=$path.'/'.$bottom['name'];
           move_uploaded_file($bottom['tmp_name'],$imgpath);
           $srcbottom='/project/'.substr($imgpath,3);
       }

       //前
       $qian=$_FILES['bottom'];
       if(is_uploaded_file($qian['tmp_name'])){
           if(!file_exists('../static/upload')){
               mkdir('../static/upload',0777,true);
           }
           $path='../static/upload/'.date('y-m-d');

           if(!file_exists($path)){
               mkdir($path,0777,true);
           }
           $imgpath=$path.'/'.$qian['name'];
           move_uploaded_file($qian['tmp_name'],$imgpath);
           $srcqian='/project/'.substr($imgpath,3);
       }

       //后
       $hou=$_FILES['hou'];
       if(is_uploaded_file($hou['tmp_name'])){
           if(!file_exists('../static/upload')){
               mkdir('../static/upload',0777,true);
           }
           $path='../static/upload/'.date('y-m-d');

           if(!file_exists($path)){
               mkdir($path,0777,true);
           }
           $imgpath=$path.'/'.$hou['name'];
           move_uploaded_file($hou['tmp_name'],$imgpath);
           $srchou='/project/'.substr($imgpath,3);
       }
       $sql="update  stroy set strtitle='{$strtitle}',strcent='{$strcent}',strtou='{$src}',leftpho='{$srcleft}',rightpho='{$srcright}',top='{$srctop}',bottom='{$srcbottom}',qian='{srcqian}',hou='{srchou}' where yid={$yid}";
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
?>