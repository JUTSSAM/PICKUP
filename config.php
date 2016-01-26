<?php



$_PICK = array();
$_PICK['db_server'] = SAE_MYSQL_HOST_M;
$_PICK['db_database'] = SAE_MYSQL_DB;
$_PICK['db_port'] = SAE_MYSQL_PORT;
$_PICK['db_user'] = SAE_MYSQL_USER;
$_PICK[ 'db_password' ] = SAE_MYSQL_PASS;
$_PICK[ 'ClassMenu' ] = 'datas';
$_PICK['StudentsTable'] = 'Stu';

function dbcon()
{

if(!@mysql_connect($_PICK[ 'db_server' ],$_PICK[ 'db_user' ],$_PICK[ 'db_password'])||!@mysql_select_db($_PICK['db_database']))
{
	die('database connect error');
}else{
	echo "数据库连接成功<br>";
	}
mysql_query("set names utf8");
}

function StrCheck($str){
	if(strlen($str)<6){
		return false;
	}else{
		
		return true;
	}
}

?>






