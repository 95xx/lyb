<?php
	include "comm.php";
	include "pages.class.php";
	check_login(1);
	//获得分页的相关参数值
	//$each_disNums,$nums,$current_page,$sub_pages,$subPage_link,$subPage_type
	//1.每页显示留言数
	$each_disNums = 5;
	//2.总留言数
	$sql = "select * from ly_info ";
	$result = mysql_query($sql,$conn);
	$nums = mysql_num_rows($result);
	//3.当前所在页面
	if(isset($_GET['page'])){
		$current_page = $_GET['page'];
	}else{
		$current_page = 1;
	}

?>
<html>
<head>

<title>留言管理</title>
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
	background: blue;
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
		var ismodi = confirm("你确认要审核该留言吗？");
		if(ismodi){
			var audit = $(this).val();
			var ly_id = $(this).attr("id");
			$.ajax({
				type:'post',
				url:'modi_ly.php',
				data:{id:ly_id,audit:audit},
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
<li>当前用户：<a href="person.php">[<?php echo $_SESSION['name']; ?>]</a></li>
<li><a href="userAdmin.php">用户管理</a></li>
<li><a href="ly_admin.php">留言管理</a></li>
<li><a href="replyAdmin.php">回复管理</a></li>
<li><a href="lyb.php">返回前台</a></li>
<li><a href="person.php?login=out">退出登录</a></li>
</ul>
</div>
<div id="z">
<p>留言管理</p>
<div id="shuoming">您可在本页审核及删除留言板中的留言信息。</div>
<table>
<?php
	$ly_sql = "select * from ly_info limit ".($current_page-1)*$each_disNums.",".$each_disNums;
	$ly_result = mysql_query($ly_sql,$conn);
	$no = 1;
	echo "<tr><td width='50px'>序号</td><td>标题</td><td>留言人</td><td>审核留言</td><td>删除留言</td>";
	while($ly_row = mysql_fetch_array($ly_result)){
	$s1 = "";
	$s2 = "";
		if($no%2 == 0){
			echo "<tr>";
		}else{
			echo "<tr bgcolor=#f7f7f7>";
		}
		switch($ly_row['audit']){
				case 1:
					$s1 = "selected";
					break;
				case 0:
					$s2 = "selected";
					break;
			}
		echo "<td>".$no++."</td>";
		echo "<td width='120px'><a href='disp.php?id=".$ly_row['ly_id']."'>".$ly_row['title']."</a></td>";
		echo "<td width='90px'>".$ly_row['ly_user']."</td>";
		echo "<td width='120'><select id='ly_".$ly_row['ly_id']."'>";

				echo "<option $s1 value=1>通过</option>";
				echo "<option $s2 value=0>不通过</option>";

			echo "</select></td>";

		echo "</tr>";
	}
	echo "<tr><td colspan=4>";
	$page = new Pages($each_disNums,$nums,$current_page,5,"ly_admin.php?page=",2);
	echo "</td></tr>";

?>

</table>
</div>
</div>
</div>
</body>
</html>

