<?php
	include "comm.php";
	include "pages.class.php";
	check_login(4);
	$lyInfo = getLyInfo($_GET['id']);
	$ly_id = $_GET['id'];
	if($_GET['login'] == "out"){
		session_destroy();
		get_show_msg("�˳���¼��","login.php");
	}
	if(isset($_POST['submit'])){
		publish_reply($_POST['r_title'],$_POST['r_content'],$_GET['id']);
	}

	//��÷�ҳ����ز���ֵ
	$each_disNums = 5;
	//ÿҳ��ʾ��ҳ��
	$pageNums = 10;
	$sql = "select * from reply_info where ly_id=$ly_id";
	$result = mysql_query($sql,$conn);
	$nums = mysql_num_rows($result);
	if(isset($_GET['page'])){
		$current_page = $_GET['page'];
	}else{
		$current_page = 1;
	}
?>

<html>
<head>

<title>������ϸ��Ϣ</title>
<script type="text/javascript" src="./xheditor/jquery/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="./xheditor/xheditor-1.1.14-zh-cn.min.js"></script>
<style type="text/css">
#main {
	margin-right: auto;
	margin-left: auto;
	margin-top: 0px;
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
	height: 500px;
}
p {
	margin-left: 30px;
	margin-top: 10px;
	font-size: 22px;
	color: #CC6600;
}
#button{
	padding: 10px 30px 10px 30px;
	margin-top:20px;
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
	border-top: 1px solid #dddddd;
	margin-left:30px;
	margin-top:80px;
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
#t2 table{
	border-top: 1px solid #dddddd;
	line-height:30px;
	margin-top:0px;
}
#shuo{

	width: 450px;
	height: 30px;
	border: solid 1px #eeee00;
	background: #ffffbb;
	line-height: 30px;
	margin-left: 30px;
	margin-top:10px;
	margin-bottom:20px;
	box-shadow: 0 0 5px rgba(81, 203, 238, 1);
}
</style>
<script type="text/javascript">
function check(){
	if(myform.r_title.value==""){
		alert("���ⲻ��Ϊ�գ�");
		return false;
	}
	var cont = $("#content").val();
	if(cont==""){
		alert("�������ݲ���Ϊ�գ�");
		return false;
	}
	return true;
}
</script>
</head>
<body>
<div id="main">
<div id="shu">
<ul>
<li><a href="login.php">�û���¼</a></li>
<li><a href="register.php">�û�ע��</a></li>
<li><a href="view.php">�鿴����</a></li>
<li><a href="lyb.php">��������</a></li>
<li><a href="login_out.php">�˳���¼</a></li>
</ul>
</div>
<div id="z">
<p>������ϸ��Ϣ</p>
<div id="shuoming">�����ڴ˲鿴��ǰ���Եĵ���ϸ��Ϣ��</div>
<table>
<tr><td width="100">����:</td><td width='400px'><?php echo $lyInfo['title']; ?></td></tr>
<tr><td>������:</td><td><?php echo $lyInfo['ly_user']; ?></td></tr>
<tr><td>����ʱ��:</td><td><?php echo $lyInfo['ly_time']; ?></td></tr>
<tr><td>��������:</td><td><?php
							switch($lyInfo['ly_type']){
								case 1:
									echo "����";
									break;
								case 2:
									echo "����";
									break;
								case 3:
									echo "Ͷ��";
									break;
								case 4:
									echo "����";
									break;
								case 5:
									echo "ҵ����ϵ";
									break;
								default:
									echo "���Ͳ���";
							}
						?></td></tr>
<tr><td>��������:</td><td><?php echo $lyInfo['content']; ?></td></tr>
</table>
<div id="shuo">�����ڴ˲鿴��ǰ���Ե����Իظ����ݡ�</div>
<div id="t2">

<?php
	$r_sql = "select * from reply_info where ly_id=$ly_id limit ".($current_page-1)*$each_disNums.",".$each_disNums;
	$r_result = mysql_query($r_sql,$conn);
	while($r_row = mysql_fetch_array($r_result)){
		echo "<table>";
		echo "<tr><td width='100px'>�ظ�����:</td><td width='400px'>".$r_row['r_title']."</td></tr>";
		echo "<tr><td>�ظ��ˣ�</td><td>".$r_row['r_user']."</td></tr>";
		echo "<tr><td>�ظ�ʱ�䣺</td><td>".$r_row['r_time']."</td></tr>";
		echo "<tr><td>�ظ����ݣ�</td><td>".$r_row['r_content']."</td></tr>";
	}
	echo "<tr><td colspan=2>";
	$page = new Pages($each_disNums,$nums,$current_page,$pageNums,"disp.php?id=$ly_id&page=",1);
	echo "</td></tr></table>";
?>

<table>
<form id="myform" action="" method="post" onsubmit="return check();">
<tr><td width='100px'>�ظ�����:</td><td><input type='text' id='title' name='r_title' size=40 value="<?php echo 'Re:'.$lyInfo['title']; ?>"></td></tr>
<tr><td valign=top>�ظ����ݣ�</td><td><label >
    <textarea class="xheditor" name="r_content" id="content" cols="50" rows="10"></textarea>
</label>
</td></tr>
<tr><td></td><td>
	<input type="submit" id="button" value="�ظ�" name="submit" >
	<input type="reset" id="button" value="����" name="reset" >
</td></tr>
</form>
</table>
</div>
</div>
</div>
</body>
</html>
