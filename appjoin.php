<?php

require_once 'config.php';

$con = mysql_connect($_PICK[ 'db_server' ].':'.$_PICK['db_port'],$_PICK[ 'db_user' ],$_PICK[ 'db_password']);
$db_selected = mysql_select_db($_PICK[ 'db_database' ], $con);
mysql_query("set names utf8");

$consult_keyword = mysql_query("SELECT datetime,classname,tname  FROM `datas` WHERE keyword='".$_POST['keyword']."'",$con);
$class_info = mysql_fetch_array($consult_keyword);
$consult_stu = mysql_query("SELECT `stu_id`,`nfc_id`,`stu_name`FROM `stu2` WHERE `nfc_id` ='".$_POST['nfcId']."'",$con);
$stu_info = mysql_fetch_array($consult_stu);

	$stuid = $_POST['stuId'];
	$nfcid = $_POST['nfcId'];
	$stuname = $_POST['stuName'];
	$keyword = $_POST['keyword'];
//	
if (!($stuid&&$stuname&&$keyword)) {
	$arr = array(
		"code"=>0,
		"msg"=>"输入有误，请检查！");
	$strr = json_encode($arr);
	echo $strr;		
}else{

if($class_info){
	$result = mysql_query("INSERT INTO `stu`(`stuid`, `Stuname`, `keyword`) VALUES ('$stuid','$stuname',$keyword);");
	if ($result){
	$arr = array(
    	"code" => 1, 
    	"msg" =>"点名成功请核对信息",
    	"obj" => array(
    		"tName" => $class_info[2] ,
    		"className" => $class_info[1]
    		)
    	);
    	$strr = json_encode($arr);	
	echo $strr;
	}else{
	$arr = array(
		"code" => 0,
		"msg" =>"点名失败请重试"
		);
	$strr = json_encode($arr);
	echo $strr;
	}
}else{
	$arr = array(
		"code" => 0,
		"msg" =>"口令错误"
		);
	$strr = json_encode($arr);
	echo $strr;
}
}
?>
