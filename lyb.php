<?php
	include "comm.php";
	//check_login�����Ĳ�����Ϊ��ҳ����û����Ȩ��ֵ
	check_login(2);
	if(isset($_POST['submit'])){
		publish_ly($_POST['title'],$_POST['type'],$_POST['content']);
	}
 ?>
<html>

<head>
<title>��������</title>
<script type="text/javascript" src="./xheditor/jquery/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="./xheditor/xheditor-1.1.14-zh-cn.min.js"></script>
<style type="text/css">
boy{
	text-align: center;
	width:100%;
}
#main {

	margin: 0 auto;
	margin-top: 0px;
	margin-bottom: 0px;
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
	padding: 10px 20px 10px 20px;
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
	margin-left:30px;
	margin-top:80px;
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
	height: 60px;
	border: solid 1px #eeee00;
	background: yellow;
	line-height: 30px;
	margin-top: 20px;
	margin-left: 30px;
	padding-left: 10px;
	box-shadow: 0 0 5px rgba(81, 203, 238, 1);
}
</style>
<script type="text/javascript">
function check(){
	if(myform.title.value==""){
		alert("���ⲻ��Ϊ�գ�");
		return false;
	}
	if(myform.type.value==""){
		alert("���Ͳ���Ϊ�գ�");
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
<li>��ǰ�û���<a href="person.php">[<?php echo $_SESSION['name']; ?>]</a></li>
<li><a href="login.php">�û���¼</a></li>
<li><a href="register.php">�û�ע��</a></li>
<li><a href="view.php">�鿴����</a></li>
<li><a href="lyb.php">��������</a></li>
<li><a href="person.php?login=out">�˳���¼</a></li>
</ul>
</div>

<div id="z">
	<p>��������</p>
	<div id="shuoming">��л���������������ͽ��飬���ǻ����漰ʱ�����������ԣ���ͨ�������ʼ������ظ���</div>
<div id="ly">
<table>
<form id="myform" action="" method="post" onsubmit="return check();">
<tr><td width="70px">����:</td><td><input type="text" id="title" name="title" size=40;></td></tr>
<tr><td>����:</td><td>
	<input id="Type_0" name="type" type="radio" value="1">����
	<input id="Type_1" name="type" type="radio" value="2">����
	<input id="Type_2" name="type" type="radio" value="2">Ͷ��
	<input id="Type_3" name="type" type="radio" value="3">����
	<input id="Type_4" name="type" type="radio" value="4">ҵ����ϵ
</td></tr>
<tr><td valign=top>���ݣ�</td><td><label >
    <textarea class="xheditor" name="content" id="content" cols="50" rows="10"></textarea>
</label>
</td></tr>
<tr><td></td><td>
	<input type="submit" id="button" value="�ύ" name="submit" >
	<input type="reset" id="button" value="����" name="reset" >
</td></tr>
</form>
</table>
</div>
</div>
</div>
</body>
</html>