<?php

require_once 'config.php';

$con = mysql_connect(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);if(!$con){ die('could not connect:'.mysql_error()); }mysql_select_db(SAE_MYSQL_DB,$con);

if(!@mysql_connect($_PICK['db_server'].':'.$_PICK['db_port'],$_PICK['db_user'],$_PICK['db_password'])||!@mysql_select_db($_PICK['db_database']))
{
	die('数据库连接失败<br>');
}else{
	// echo "数据库连接成功<br>";
	}

	mysql_query("set names utf8");

	$keyword = rand(100000,999999);
	$time = time();

	

if (isset($_REQUEST['check'])) {
	if(!StrCheck($_REQUEST['tname'])&&!StrCheck($_REQUEST['keyword'])&&!StrCheck($_REQUEST['class'])){
		die("不合法的输入<br>");
	}else{
		if(!$result = mysql_query("INSERT INTO datas (classname,tname,keyword,datetime) VALUES ('$_REQUEST[classname]','$_REQUEST[tname]','$keyword',$time);"))
		{
			die('Error'.mysql_error().'<br>');
		}else{
			echo "发布信息如下：<br>";
			echo "课程名称:".$_REQUEST['classname']."<br>";
			echo "教师姓名:".$_REQUEST['tname']."<br>";
			echo "随机口令:".$keyword."<br>";
			
		}
		
	}

	$check_result = mysql_query("SELECT `classname` FROM  `datas` WHERE 1;");
	$check_info = mysql_fetch_array($check_result);
	$check_info2 = mysql_fetch_array($check_result);
	
	var_dump($check_info);
	echo "<br>";
	var_dump($check_info2);
	echo "<br>";

}
?>
<!DOCTYPE html>
<html>
<head>
	<meta  http-equiv="content-type" content="text/html"  charset="utf8">
	<title>Set a new pick-up</title>
</head>
<body>

	<form action="?check" method="POST">
		
		教师姓名:<input type="text" name="tname" ><br>
		课程姓名:<input type="text" name="classname"><br>
		<input type="submit" value="submit"><br>


	</form>

</body>
</html>
