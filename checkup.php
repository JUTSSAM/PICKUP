<?php
	require_once 'config.php';
	include"test.html";
	$con = mysql_connect($_PICK[ 'db_server' ].':'.$_PICK['db_port'],$_PICK[ 'db_user' ],$_PICK[ 'db_password']);
	$db_selected = mysql_select_db($_PICK[ 'db_database' ], $con);
	mysql_query("set names utf8");
		echo "<div id='link'><span id='test'>";
		//var_dump($_POST['classname']);
		//var_dump($_POST['classid']);
		$consult_key = mysql_query("SELECT keyword FROM  `datas` WHERE classname =  '".$_POST['classname']."' AND classid =".$_POST['classid']);
		var_dump($consult_key);
		$result_keyword = mysql_fetch_array($consult_key);
		var_dump($result_keyword['keyword']);
		$consult = mysql_query("SELECT DISTINCT stuid,stuname FROM `stu` where keyword=".$result_keyword['keyword'],$con);
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
		echo "</span></div>";
	

?>


