<?php
	include "comm.php";
	include "pages.class.php";
	check_login(3);
	//��÷�ҳ����ز���ֵ
	//$each_disNums,$nums,$current_page,$sub_pages,$subPage_link,$subPage_type
	//1.ÿҳ��ʾ������
	$each_disNums = 5;
	//2.��������
	$sql = "select * from ly_info where audit=1";
	$result = mysql_query($sql,$conn);
	$nums = mysql_num_rows($result);
	//3.��ǰ����ҳ��
	if(isset($_GET['page'])){
		$current_page = $_GET['page'];
	}else{
		$current_page = 1;
	}

?>
<html>
<head>

<title>�鿴����</title>
<style type="text/css">
#main {
	margin-right: auto;
	margin-left: auto;
	width: 800px;
}
#shu {
	width: 200px;
	height: 500px;
	background: blue;
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

</head>
<body>
<div id="main">
<div id="shu">
<ul>
<li>��ǰ�û���<a href="person.php">[<?php echo $_SESSION['name']; ?>]</a></li>
<?php
	if(getUserPower()<=3){
		echo "<li>";
		echo "<a href='admin.php'>��̨����</a></li>";
	}
 ?>
<li><a href="login.php">�û���¼</a></li>
<li><a href="register.php">�û�ע��</a></li>
<li><a href="view.php">�鿴����</a></li>
<li><a href="lyb.php">��������</a></li>
<li><a href="person.php?login=out">�˳���¼</a></li>
</ul>
</div>
<div id="z">
<p>�鿴����</p>
<div id="shuoming">��ӭ���鿴�����԰��е����ԣ������Ե�����Է�����ػظ���</div>
<table>
<?php
	$ly_sql = "select * from ly_info where audit=1 limit ".($current_page-1)*$each_disNums.",".$each_disNums;
	$ly_result = mysql_query($ly_sql,$conn);
	$no = 1;
	echo "<tr><td width='50px'>���</td><td>����</td><td>������</td><td>����ʱ��</td>";
	while($ly_row = mysql_fetch_array($ly_result)){
		if($no%2 == 0){
			echo "<tr>";
		}else{
			echo "<tr bgcolor=#f7f7f7>";
		}
		echo "<td>".$no++."</td>";
		echo "<td width='120px'><a href='disp.php?id=".$ly_row['ly_id']."'>".$ly_row['title']."</a></td>";
		echo "<td width='120px'>".$ly_row['ly_user']."</td>";
		echo "<td width='200px'>".$ly_row['ly_time']."</td>";
		echo "</tr>";
	}
	echo "<tr><td colspan=4>";
	$page = new Pages($each_disNums,$nums,$current_page,5,"view.php?page=",2);
	echo "</td></tr>";

?>

</table>
</div>
</div>
</div>
</body>
</html>
