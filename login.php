<?php
	include "comm.php";
	if(isset($_POST['submit'])){
		location($_POST['name'],$_POST['pw1']);
	}
?>
<html>
<head>

<title>�û�ע��</title>
<style type="text/css">
#main {
	margin-right: auto;
	margin-left: auto;
	width: 800px;
}
#top {
	height: 50px;
	line-height: 50px;
	padding-left: 50px;
	font-size: 30px;
	font-weight: bold;
	color: #ccc;
	border: 4px solid blue;
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

<script type="text/javascript">
function check(){
	if(myform.name.value==""){
		alert("�û�������Ϊ��!");
		return false;
	}
	if(myform.pw1.value==""){
		alert("���벻��Ϊ�գ�");
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
<li><a href="person.php?login=out">�˳���¼</a></li>
</ul>
</div>
<div id="z">
<p>�û���¼</p>
<div id="shuoming">���¼�����û�����л���������������ͽ��顣</div>
<table>
<form id="myform" action="" method="post" onsubmit="return check();">
<tr><td width="100px">�û���:</td><td><input type="text" id="name" name="name"></td></tr>
<tr><td>����:</td><td><input type="password" id="pw1" name="pw1"></td></tr>
<tr><td></td><td><input type="submit" id="button" value="��¼" name="submit" ></td></tr>
</form>
</table>
</div>
</div>
</div>
</body>
</html>
