<?php
 $user_id = $_POST['id'];
 $power = $_POST['power'];
 $str_id = explode("_",$user_id);

 $id = $str_id[1];

 $conn = mysql_connect("localhost","root","123456");
 mysql_select_db("lyb");
 $sql = "update user_info set power=$power where id=$id";
 mysql_query("set names 'gb2312'");
 $result = mysql_query($sql,$conn);

 switch($power){
 	case 1:
 		$powerName = "��ͨ����Ա";
 		break;
 	case 2:
 		$powerName = "��ͨ�û�";
 		break;
 	case 3:
 		$powerName = "�����û�";
 		break;
 }

 if($result){
 	echo iconv("gb2312","utf-8","�û�Ȩ�޸���Ϊ:".$powerName);
 }else{
 	echo iconv("gb2312","utf-8","�û�Ȩ�޸���ʧ�ܣ�");
 }
?>
