<?php
	require_once 'config.php';

	$con = mysql_connect($_PICK[ 'db_server' ].':'.$_PICK['db_port'],$_PICK[ 'db_user' ],$_PICK[ 'db_password']);
	$db_selected = mysql_select_db($_PICK[ 'db_database' ], $con);
	mysql_query("set names utf8");
	
	$consult = mysql_query("SELECT stuid,stuname FROM `stu` where keyword='".$_POST['keyword']."'",$con);
	echo "到课信息如下：<br>";
	while ( $result = mysql_fetch_array($consult)) {
		echo $result[0]."|".$result[1]."<br>";
		 // foreach ($result as $data) {
			// echo $data;		
			// }
			// print_r($result);
		}


?>
