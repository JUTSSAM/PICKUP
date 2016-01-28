<?php

  require_once 'config.php';
	$con = mysql_connect($_PICK[ 'db_server' ].":".$_PICK['db_port'],$_PICK[ 'db_user' ],$_PICK[ 'db_password']);
	$db_selected = mysql_select_db($_PICK[ 'db_database' ], $con);
	mysql_query("set names utf8");
	$result = mysql_query("SELECT datetime,classname,tname,keyword FROM `datas` ");
	
	while($row = mysql_fetch_row($result)){
		echo "<br>";
		echo date('Y-m-d',$row[0]).' | '.$row[1].' | '.$row[2].'|'.$row[3];
		echo "<br>";
		
	}
	?>
