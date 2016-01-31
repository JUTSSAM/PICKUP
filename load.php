<?php
	
	$con = mysql_connect(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);if(!$con){ die('could not connect:'.mysql_error()); }mysql_select_db(SAE_MYSQL_DB,$con);

	if(!@mysql_connect($_PICK['db_server'].':'.$_PICK['db_port'],$_PICK['db_user'],$_PICK['db_password'])||!@mysql_select_db($_PICK['db_database']))
	{
	die('数据库连接失败<br>');
	}else{
	// echo "数据库连接成功<br>";
	}

	mysql_query("set names utf8");

	$create_tb = "CREATE TABLE datas(classname varchar(20),tname varchar(20),keyword int(6),datetime int(10))";
	if( !mysql_query( $create_tb ) ){
		die( "Table could not be created<br />SQL: ".mysql_error() );
		header( "Location: {$_SERVER[ 'PHP_SELF' ] }" );
	}

	if(!mysql_query( "CREATE TABLE stu(stuid varchar(11),Stuname varchar(20),keyword int(6))"))
	{
		die(mysql_error());
		header( "Location: {$_SERVER[ 'PHP_SELF' ] }" );
	}
	echo ( "'users' table was created." );




?>