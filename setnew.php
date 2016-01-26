<?php





require_once 'index.php';
require_once 'config.php';

$con = mysql_connect(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);if(!$con){ die('could not connect:'.mysql_error()); }mysql_select_db(SAE_MYSQL_DB,$con);

if(!@mysql_connect($_PICK['db_server'].':'.$_PICK['db_port'],$_PICK['db_user'],$_PICK['db_password'])||!@mysql_select_db($_PICK['db_database']))
{
	die('database connect error');
}else{
	echo "数据库连接成功<br>";
	}



?>
