<?php





require_once 'index.php';
require_once 'config.php';

if(!@mysql_connect($_PICK[ 'db_server' ],$_PICK[ 'db_user' ],$_PICK[ 'db_password'])||!@mysql_select_db($_PICK['db_database']))
{
	die('database connect error');
}else{
	echo "数据库连接成功<br>";
	}



?>
