<?php
	include "comm.php";
	$personInfo = getUserInfo($_SESSION['name']);
	if($_GET['login'] == out){
		session_destroy();
		get_show_msg("退出登录！","login.php");
	}
?>
<html>
<head>

<title>用户详细信息</title>
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
	height: 500px;
	border-right: 1px solid #dddddd;
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
	background:yellow;
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
<li><a href="login.php">用户登录</a></li>
<li><a href="register.php">用户注册</a></li>
<li><a href="view.php">查看留言</a></li>
<li><a href="lyb.php">在线留言</a></li>
<li><a href="person.php?login=out">退出登录</a></li>
</ul>
</div>
<div id="z">
<p>用户详细信息</p>
<div id="shuoming">您可在此查看个人的详细信息。</div>
<table>
<form id="myform" action="" method="post" onsubmit="return check();">
<tr><td width="100">用户名:</td><td><?php echo $personInfo['user_name']; ?></td></tr>
<tr><td>电话:</td><td><?php echo $personInfo['telephone']; ?></td></tr>
<tr><td>邮箱:</td><td><?php echo $personInfo['email']; ?></td></tr>
<tr><td>籍贯:</td><td><?php echo $personInfo['home']; ?></td></tr>
<tr><td>性别:</td><td><?php echo $personInfo['sex']; ?></td></tr>
<tr><td>积分:</td><td><?php echo $personInfo['score']; ?></td></tr>
<tr><td>等级:</td><td><?php echo $personInfo['level']; ?></td></tr>
<tr><td></td><td align="right" width="350px"><a href="#"onclick="javascript: history.back(-1);">返回</a></td></tr>
</form>
</table>
</div>
</div>
</body>
</html>
