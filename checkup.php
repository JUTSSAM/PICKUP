<?php
	require_once 'config.php';

	$con = mysql_connect($_PICK[ 'db_server' ].':'.$_PICK['db_port'],$_PICK[ 'db_user' ],$_PICK[ 'db_password']);
	$db_selected = mysql_select_db($_PICK[ 'db_database' ], $con);
	mysql_query("set names utf8");
	if (isset($_REQUEST['check'])) {
		var_dump($_REQUEST['classname']);
		var_dump($_REQUEST['classid']);
		$consult_key = //mysql_query("SELECT keyword FROM 'datas' WHERE classname = '".$_REQUEST['classname']."' AND classid = ".$_REQUEST['classid'].";");
		mysql_query("SELECT keyword FROM  `datas` WHERE classname =  '".$_REQUEST['classname']."' AND classid =".$_REQUEST['classid']);
		$result_keyword = mysql_fetch_array($consult_key);
		var_dump($result_keyword);
		$consult = mysql_query("SELECT DISTINCT stuid,stuname FROM `stu` where keyword='".$result_keyword."'",$con);
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
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>查询点名情况</title>
</head>
<body>

	<form action="?check" method="post">
		
		课程名称:<input type="text" name="classname"><br>
		课程节次:<input type="text" name="classid"><br>
        	<!--口令:<input type="text" name="keyword"><br>-->
		<input type="submit" value="提交"><br>
		
	</form>
	
</body>
</html>
