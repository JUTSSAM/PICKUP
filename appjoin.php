<?php

require_once 'config.php';

$con = mysql_connect($_PICK[ 'db_server' ].':'.$_PICK['db_port'],$_PICK[ 'db_user' ],$_PICK[ 'db_password']);
$db_selected = mysql_select_db($_PICK[ 'db_database' ], $con);
mysql_query("set names utf8");

$consult = mysql_query("SELECT datetime,classname,tname  FROM `datas` WHERE keyword='".$_POST['keyword']."'",$con);
$row = mysql_fetch_array($consult);
$stuid = $_POST['stuId'];
$stuname = $_POST['stuName'];
$keyword = $_POST['keyword'];
if($row){
    // echo "请核对信息<br>";
    // //echo $row[0]."|".$row[1]."|".$row[2]."<br>";
    // echo "课程名称：".$row[1]."<br>"."教师姓名：".$row[2]."<br>";
  	$result = mysql_query("INSERT INTO `stu`(`stuid`, `Stuname`, `keyword`) VALUES ($stuid,'$stuname',$keyword);");
	if ($result){
	$arr = array(
    	"code" => 1, 
    	"msg" =>"点名成功请核对信息",
    	"obj" => array(
    		"tName" => $row[2] ,
    		"className" => $row[1]
    		)
    	);
    	//$strr = json_encode($arr);	
	//echo $strr;
	var_dump($arr);
	}else{
	$arr = array(
		"code" => 0,
		"msg" =>'点名失败请重试'
		)
	// $strr = json_encode($arr);
	// echo $strr;
	var_dump($arr);
	 }
}else{
	die("Wrong input!");
	
}
?>