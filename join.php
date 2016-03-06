<?php
include"test.html";
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
	//echo "<div id=\"info\">";
	$consult = mysql_query("SELECT datetime,classname,tname  FROM `datas` WHERE keyword='".$_POST['keyword']."'",$con);
	$row = mysql_fetch_array($consult);
	$stuid = $_POST['stuid'];
	$stuname = $_POST['stuname'];
	$keyword = $_POST['keyword'];
	$result_repeat = mysql_query("SELECT *  FROM `stu` WHERE keyword='".$keyword."' and stuid ='".$stuid."';",$con);
	$repeat_info = mysql_fetch_array($result_repeat);

	if($row){
		
	    echo "请核对信息<br>";
	    //echo $row[0]."|".$row[1]."|".$row[2]."<br>";
	    echo "课程名称：".$row[1]."<br>"."教师姓名：".$row[2]."<br>";
	    if (!$repeat_info) {
	    	 $result = mysql_query("INSERT INTO `stu`(`stuid`, `Stuname`, `keyword`) VALUES ($stuid,'$stuname',$keyword);");
		if ($result){
	    	echo "签到成功！<br>";
			}	
	    }
	   
	}else{
	    die( "输入有误，请核对重新输入<br>");
	}
	//echo "</div>";

?>