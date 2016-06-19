<?php
    session_start();
    date_default_timezone_set("Asia/Shanghai");
	$conn = mysql_connect("localhost","root","123456789");
 	mysql_select_db("lyb");
 	mysql_query("set names 'gb2312'");

	function get_show_msg($msg,$url){
		$win_str="<meta http-equiv='refresh' content='3;url=".$url."'>
<table border='1 #000' align='center';margin-right: auto;margin-left: auto;>
<tr><td style='text-align:center; bgcolor:#a67d3d;color:#000;' bgcolor='#ffffff';>��Ϣ����</td></tr>
<tr><td style='text-align:center; bgcolor:#238e68;color:#000;line-height:200%;' bgcolor='#ffffff';>$msg<br>
3���Ӻ��Զ�����ָ��ҳ�棡<br>
����Զ�����ʧЧ������<a href='".$url."'>�˴�</a>
</td></tr>
<tr>
<td></td>
</tr>
</table>";
		echo $win_str;
		exit();
	}

 	function register($name,$pw,$phone,$email,$home,$sex){
 		global $conn;
 		if(checkName($name)){
 			$sql = "insert into user_info(user_name,password,telephone,email,home,sex,score,level,power) value('".$name."','".md5($pw)."','".$phone."','".$email."','".$home."','".$sex."',0,'�±�',2)";
 			$result = mysql_query($sql,$conn);
 			//echo $sql;
 			if($result){
 				$_SESSION['name'] = $name;
				$_SESSION['pw1'] = $pw;
 				get_show_msg("ע��ɹ�","lyb.php");
 			}else{
 				get_show_msg("ע��ʧ��","register.php");
 			}
 		}else{
 			get_show_msg("�û����Ѿ����ڣ�����������","register.php");

 		}
 	}
	function checkName($name){
		global $conn;
		$sql = "select * from user_info where user_name='".$name."'";
		$result = mysql_query($sql,$conn);
		$num_row = mysql_num_rows($result);
		if($num_row>=1){
			return false;
		}else{
			return true;
		}
	}

	function location($name,$pw){
		global $conn;
		$sql = "select * from user_info where user_name='$name' and password='".md5($pw)."'";
		//echo $sql;
		$result = mysql_query($sql,$conn);
		if(mysql_num_rows($result)>0){
			$_SESSION['name'] = $name;
			$_SESSION['pw1'] = $pw;
			get_show_msg("��ӭ".$name."���뱾���԰�","lyb.php");
		}else{
			get_show_msg("�û�����������������µ�¼","login.php");
		}
	}
	function check_login($power){
		global $conn;
		$sql = "select * from user_info where user_name='".$_SESSION['name']."' and password='".md5($_SESSION['pw1'])."'";
		$result = mysql_query($sql,$conn);
		$row = mysql_fetch_array($result);
		if(mysql_num_rows($result)<=0){
			get_show_msg("�Ƿ����ʣ����ȵ�¼��","login.php");
		}else{
			if($row['power']>$power){
				get_show_msg("Ȩ�޲��㣬�޷����ʱ�ҳ�棡","login.php");
			}
		}
	}

	function getUserInfo($name){
		global $conn;
		$sql = "select * from user_info where user_name='".$name."'";
		$result = mysql_query($sql,$conn);
		$row = mysql_fetch_array($result);
		return $row;
	}
	function publish_ly($title,$ly_type,$cont){
		global $conn;
		$sql = "insert into ly_info(title,ly_type,ly_user,ly_time,content) values('$title',$ly_type,'".$_SESSION['name']."','".date("Y-m-d H:i:s")."','$cont')";
		$result = mysql_query($sql,$conn);
		if($result){
			update_score(10);
			$dj_msg = update_level();
			get_show_msg("�������Գɹ���".$dj_msg,"lyb.php");
		}else{
			get_show_msg("��������ʧ�ܣ�","lyb.php");
		}
	}

	function update_score($fen){
		global $conn;
		$sql = "update user_info set score=score+".$fen." where user_name='".$_SESSION['name']."'";
		$result = mysql_query($sql,$conn);
		if(!$result){
			get_show_msg("����ʧ�ܣ�","lyb.php");
		}
	}
	function update_level(){
		global $conn;
		//1.��õ�ǰ�û��ĵȼ����ֺ͵ȼ�����
		$sql = "select * from user_info where user_name='".$_SESSION['name']."'";
		$result = mysql_query($sql,$conn);
		$row = mysql_fetch_array($result);
		$curr_score = $row['score'];
		$curr_level = $row['level'];
		//2.�ӵȼ����ݱ��л����һ�ȼ��Ļ��ֺ�����
		$dj_sql = "select * from ly_dj where dj_name='".$row['level']."'";
		$dj_result = mysql_query($dj_sql,$conn);
		$dj_row = mysql_fetch_array($dj_result);
		//3.��һ�ȼ��������Ϣ
		$next_dj = "select * from ly_dj where dj_id=".($dj_row['dj_id']+1);
		$next_result = mysql_query($next_dj,$conn);
		$next_row = mysql_fetch_array($next_result);
		//print_r($next_row);
		//4.�Ƚϵ�ǰ�û����ֺ���һ�ȼ��Ļ���
		if($curr_score>=$next_row['dj_level']){
			$update_sql = "update user_info set level='".$next_row['dj_name']."' where user_name='".$_SESSION['name']."'";
			$update_result = mysql_query($update_sql,$conn);
			if($update_result){
				return "����Ϊ".$next_row['dj_name'];
			}
		}else{
			return "";
		}
	}
	function getLyInfo($id){
		global $conn;
		$sql = "select * from ly_info where ly_id=$id";
		$result = mysql_query($sql,$conn);
		$row = mysql_fetch_array($result);
		return $row;
	}
	function publish_reply($r_title,$r_cont,$ly_id){
		global $conn;
		$sql = "insert into reply_info(r_title,ly_id,r_user,r_time,r_content) values('$r_title',$ly_id,'".$_SESSION['name']."','".date("Y-m-d H:i:s")."','$r_cont')";
		$result = mysql_query($sql,$conn);
		if($result){
			update_score(5);
			$update_msg = update_level();
			get_show_msg("����ظ��ɹ���".$update_msg,"view.php");
		}else{
			get_show_msg("����ظ�ʧ�ܣ�","view.php");
		}
	}

	function getUserPower(){
		global $conn;
		$sql = "select * from user_info where user_name='".$_SESSION['name']."'";
		$result = mysql_query($sql,$conn);
		$row = mysql_fetch_array($result);
		return $row['power'];
	}

	function getUserById($id){
		global $conn;
		$sql = "select * from user_info where id=$id";
		//echo $sql;
		$result = mysql_query($sql,$conn);
		$row = mysql_fetch_array($result);
		return $row;
	}

	/*function deleUser($id){
		global $conn;
		$sql = "delete from user_info where id=$id";
		$result = mysql_query($sql,$conn);
		if($result){
			get_show_msg("�û�ɾ���ɹ���","admin.php");
		}else{
			get_show_msg("�û�ɾ��ʧ�ܣ�","admin.php");
		}
	}*/
?>
