<?php
 $user_id = $_POST['id'];
 $power = $_POST['power'];
 $str_id = explode("_",$user_id);

 $id = $str_id[1];

 $conn = mysql_connect("localhost","root","123456");
 mysql_select_db("lyb");
 $sql = "delete from user_info where id=$id";
 mysql_query("set names 'gb2312'");
 $result = mysql_query($sql,$conn);

  if($result){
 	echo iconv("gb2312","utf-8","用户删除成功！");
 }else{
 	echo iconv("gb2312","utf-8","用户删除失败！");
 }
?>
