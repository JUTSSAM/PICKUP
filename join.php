<?php

require_once 'config.php';

// if(!@$con=mysql_connect($_PICK['db_server'].':'.$_PICK['db_port'],$_PICK['db_user'],$_PICK['db_password'])||!@mysql_select_db($_PICK['db_database']))
// {
//         die('数据库连接失败<br>');
// }else{
//         // echo "数据库连接成功<br>";
//         }

$con = mysql_connect($_PICK[ 'db_server' ].':'.$_PICK['db_port'],$_PICK[ 'db_user' ],$_PICK[ 'db_password']);
$db_selected = mysql_select_db($_PICK[ 'db_database' ], $con);
mysql_query("set names utf8");

$consult = mysql_query("SELECT datetime,classname,tname  FROM `datas` WHERE keyword='".$_POST['keyword']."'",$con);
$row = mysql_fetch_array($consult);
$stuid = $_POST['stuid'];
$stuname = $_POST['stuname'];
$keyword = $_POST['keyword'];
if($row){
    echo "请核对信息<br>";
    //echo $row[0]."|".$row[1]."|".$row[2]."<br>";
    echo "课程名称：".$row[1]."<br>"."教师姓名：".$row[2]."<br>";
    
    $result = mysql_query("INSERT INTO `stu`(`stuid`, `Stuname`, `keyword`) VALUES ($stuid,'$stuname',$keyword);");
	if ($result){
    	echo "签到成功！<br>";
		}	
}else{
    die( "输入有误，请核对重新输入<br>");
    header("join.html");
}

?>
