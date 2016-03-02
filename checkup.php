<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>查询点名情况</title>
</head>
<body>

	<form action="?check" method="post">
		
		<!-- 学号:<input type="text" name="stuid" ><br>
		姓名:<input type="text" name="stuname"><br> -->
        		口令:<input type="text" name="keyword"><br>
		<input type="submit" value="提交"><br>
		
	</form>
	
</body>
</html>

<?php
	require_once 'config.php';

	$con = mysql_connect($_PICK[ 'db_server' ].':'.$_PICK['db_port'],$_PICK[ 'db_user' ],$_PICK[ 'db_password']);
	$db_selected = mysql_select_db($_PICK[ 'db_database' ], $con);
	mysql_query("set names utf8");
	if (isset($_REQUEST['check'])) {
		$consult = mysql_query("SELECT DISTINCT stuid,stuname FROM `stu` where keyword='".$_REQUEST['keyword']."'",$con);
		echo "到课信息如下：<br>";
		while ( $result = mysql_fetch_array($consult)) {
		echo "<tr>";
			echo $result[0]."</tr><tr>".$result[1]."<br>";
			 // foreach ($result as $data) {
				// echo $data;		
				// }
				// print_r($result);
			}
		echo "</tr>";
	}

?>
