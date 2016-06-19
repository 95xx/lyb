<?php
	include "comm.php";
	include "pages.class.php";
	check_login(1);
	//��÷�ҳ����ز���ֵ
	//$each_disNums,$nums,$current_page,$sub_pages,$subPage_link,$subPage_type
	//1.ÿҳ��ʾ������
	$each_disNums = 5;
	//2.��������
	$pageNums = 10;
	//��ȡ��ǰ�û���Ȩ��ֵ
	$currUser = getUserInfo($name);
	$curr_power = $currUser['power'];
	$sql = "select * from user_info where power>$curr_power";
	$result = mysql_query($sql,$conn);
	$nums = mysql_num_rows($result);
	//3.��ǰ����ҳ��
	if(isset($_GET['page'])){
		$current_page = $_GET['page'];
	}else{
		$current_page = 1;
	}
/*
	//ɾ��ָ���û�
	if(isset($_GET['deleUser'])){
		deleUser($_GET['deleUser']);
	}
	function deleUser(){
	var isdele = confirm("��ȷ��Ҫɾ�����û���");
	if(isdele){
		return true;
	}else{
		return false;
	}
}
	*/
?>
<html>
<head>

<title>��̨����</title>
<style type="text/css">
#main {
	margin-right: auto;
	margin-left: auto;
	width: 800px;
}
#shu {
	width: 200px;
	height: 500px;
	background:blue;
	line-height: 30px;
	border: 1px solid red;
	border-radius:5px;
	color: #000;
	float: left;
	font-size: 18px;
}
#shu ul li {
	list-style-type: none;
}

#z {
	width:524px;
	float: left;
	height: 600px;
}
p {
	margin-left: 30px;
	margin-top: 10px;
	font-size: 22px;
	color: #CC6600;
}
#button{
	padding: 10px 30px 10px 30px;
	margin-top:190px;
	margin-left:0px;
	background: green;
	border: none;
	color: red;
	box-shadow: 1px 1px 1px #4C6E91;
	-webkit-box-shadow: 1px 1px 1px #4C6E91;
	-moz-box-shadow: 1px 1px 1px #4C6E91;
	text-shadow: 1px 1px 1px #5079A3;
}
table{
	margin-left:30px;
	margin-top:50px;
	line-height:30px;
}
a {
	text-decoration: none;
	color: #000;
}
a:hover{
	color: pink;
}
#shuoming{
	width: 450px;
	height: 30px;
	border: solid 1px #eeee00;
	background: yellow;
	line-height: 30px;
	margin-top: 50px;
	margin-left: 30px;
	padding-left: 10px;
	box-shadow: 0 0 5px rgba(81, 203, 238, 1);
}
</style>
<script type="text/javascript" src="./xheditor/jquery/jquery-1.4.4.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("select").change(function(){
		var ismodi = confirm("��ȷ��Ҫ�޸ĸ��û�Ȩ����");
		if(ismodi){
			var power = $(this).val();
			var user_id = $(this).attr("id");
			$.ajax({
				type:'post',
				url:'modi_power.php',
				data:{id:user_id,power:power},
				success:function(data){
					alert(data);
			}
		});
		}
 	});
 	$("input").click(function(){
 		var isdele = confirm("��ȷ��Ҫɾ�����û���");
 		if(isdele){
 			var user_id = $(this).attr("id");
 			$.ajax({
 				type:'post',
				url:'dele_user.php',
				data:{id:user_id},
				success:function(data){
					alert(data);
			}
 			});
 		}
 	});
});

</script>

</head>
<body>
<div id="main">
<div id="shu">
<ul>
<li>��ǰ�û���<a href="person.php">[<?php echo $_SESSION['name']; ?>]</a></li>
<li><a href="admin.php">�û�����</a></li>
<li><a href="ly_admin.php">���Թ���</a></li>
<li><a href="replyAdmin.php">�ظ�����</a></li>
<li><a href="lyb.php">����ǰ̨</a></li>
<li><a href="person.php?login=out">�˳���¼</a></li>
</ul>
</div>
<div id="z">
<p>�û�����</p>
<div id="shuoming">��ӭ���ڴ˴������û��������Ϣ��</div>
<table>
<?php
	$ly_sql = "select * from user_info where power>$curr_power limit ".($current_page-1)*$each_disNums.",".$each_disNums;
	$ly_result = mysql_query($ly_sql,$conn);
	$no = 1;
	echo "<tr><td width='50px'>���</td><td>�û���</td><td>�û��ȼ�</td><td>�û�Ȩ��</td><td>�û�����</td>";

	while($ly_row = mysql_fetch_array($ly_result)){
	$s1 = "";
	$s2 = "";
	$s3 = "";
		if($no%2 == 0){
				echo "<tr bgcolor=#f7f7f7>";
			}else{
				echo "<tr>";
			}
			switch($ly_row['power']){
				case 1:
					$s1 = "selected";
					break;
				case 2:
					$s2 = "selected";
					break;
				case 3:
					$s3 = "selected";
					break;
			}
			echo "<tr><td>".$no++."</td>";
			echo "<td width='100px'><a href='user.php?id=".$ly_row['id']."'>".$ly_row['user_name']."</a></td>";
			echo "<td width='100px'>".$ly_row['level']."</td>";
			echo "<td width='120'><select id='power_".$ly_row['id']."'>";
			if($curr_power==0){
				echo "<option $s1 value=1>��ͨ����Ա</option>";
				echo "<option $s2 value=2>��ͨ�û�</option>";
				echo "<option $s3 value=3>�����û�</option>";
			}else{
				echo "<option $s2 value=2>��ͨ�û�</option>";
				echo "<option $s3 value=3>�����û�</option>";
			}

			echo "</select></td>";
			echo "<td width='70px'><input type='button' value='ɾ��' id='dele_".$ly_row['id']."'></td>";
			echo "</tr>";
		}
	echo "<tr><td colspan=4>";
	$page = new Pages($each_disNums,$nums,$current_page,5,"admin.php?page=",2);
	echo "</td></tr>";

?>

</table>
</div>
</div>
</div>
</body>
</html>

