<?php
$ly_id = $_POST['id'];
 $audit = $_POST['audit'];
 $str_id = explode("_",$ly_id);

 $id = $str_id[1];

 $conn = mysql_connect("localhost","root","123456");
 mysql_select_db("lyb");
 $sql = "update ly_info set audit=$audit where ly_id=$id";

 mysql_query("set names 'gb2312'");
 $result = mysql_query($sql,$conn);

 switch($audit){
 	case 1:
 		$auditName = "���ͨ��";
 		break;
 	case 0:
 		$auditName = "��˲�ͨ��";
 		break;
 }

 if($result){
 	echo iconv("gb2312","utf-8","�������Ϊ:".$auditName);
 }else{
 	echo iconv("gb2312","utf-8","�������ʧ�ܣ�");
 }
?>
