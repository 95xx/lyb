<?php
	include "comm.php";
	if(isset($_POST['submit'])){
		register($_POST['name'],$_POST['pw1'],$_POST['phone'],$_POST['email'],$_POST['home'],$_POST['sex']);
	}
?>
<html>
<head>

<title>用户注册</title>
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
	border: 4px solid green;
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
		alert("用户名不能为空!");
		return false;
	}
	if(myform.pw1.value==""){
		alert("密码不能为空！");
		return false;
	}
	if(myform.pw2.value==""){
		alert("密码不能为空！");
		return false;
	}
	if(myform.pw1.value!=myform.pw2.value){
		alert("密码不一致，请重新输入！");
		return false;
	}
	if(myform.phone.value==""){
		alert("电话不能为空！");
		return false;
	}
	if(myform.email.value==""){
		alert("邮箱不能为空！");
		return false;
	}
	if(myform.home.value==""){
		alert("籍贯不能为空！");
		return false;
	}
	if(myform.sex.value==""){
		alert("性别不能为空！");
		return false;
	}
}
</script>

</head>
<body>
<div id="main">
<div id="shu">
<ul>
<li><a href="login.php">用户登录</a></li>
<li><a href="register.php">用户注册</a></li>
<li><a href="view.php">查看留言</a></li>
<li><a href="lyb.php">在线留言</a></li>
<li><a href="person.php?login=out">退出登录</a></li>
</ul>
</div>
<div id="z">
<p>用户注册</p>
<div id="shuoming">请注册您的用户，感谢您提出的需求、意见和建议。</div>
<table>
<form id="myform" action="" method="post" onsubmit="return check();">
<tr><td width="100px">用户名:</td><td width="200px"><input type="text" id="name" name="name" ></td></tr>
<tr><td>输入密码:</td><td><input type="password" id="pw1" name="pw1"></td></tr>
<tr><td>再次输入密码:</td><td><input type="password" id="pw2" name="pw2"></td></tr>
<tr><td>电话:</td><td><input type="text" id="phone" name="phone"></td></tr>
<tr><td>邮箱:</td><td><input type="text" id="email" name="email"></td></tr>
<tr><td>籍贯:</td><td><input type="text" id="home" name="home"></td></tr>
<tr><td>性别:</td><td><input id="sex" name="sex" type="radio" value="男">男<input id="sex" name="sex" type="radio" value="女">女<br>
<tr><td></td><td><input type="submit" id="button" value="注册" name="submit" ></td></tr>
</form>
</table>
</div>
</div>
</body>
</html>
