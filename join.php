<?php

require_once 'config.php';

dbcon();

$consult = mysql_query("SELECT datetime,classname,tname  FROM `datas` WHERE keyword='".$_POST['keyword']."'",$con);
$row = mysql_fetch_array($consult);
$stuid = $_POST['stuid'];
$stuname = $_POST['stuname'];
$keyword = $_POST['keyword'];
if($row){
    echo "请核对信息<br>";
    echo $row[0]."|".$row[1]."|".$row[2]."<br>";
    
    $result = mysql_query("INSERT INTO `stu`(`stuid`, `Stuname`, `keyword`) VALUES ($stuid,'$stuname',$keyword);");
	if ($result){
    	echo "签到成功<br>";
		}	
}else{
    die( "输入有误，请核对重新输入<br>");
    header("join.html");
}

?>