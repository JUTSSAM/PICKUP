<?php

	$con = mysql_connect($_PICK['db_server'].':'.$_PICK['db_port'];,$_PICK['db_user'],$_PICK['db_password']);
	$db_selected = mysql_select_db($_PICK[ 'db_database' ], $con);
	$consult = mysql_query("SELECT stuid,stuname FROM `stu` where keyword='".$_POST['keyword']."'",$con);



?>
