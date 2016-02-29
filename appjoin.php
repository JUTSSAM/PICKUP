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

	if (!$stu_info)
	{
		if (!($stuid&&$stuname&&$keyword)) {
		$arr = array(
			"code"=>0,
			"msg"=>"输入有误，请检查！");
		$strr = json_encode($arr);
		echo $strr;		
		}else{
			$register_result = mysql_query("INSERT INTO `stu2`(`stu_id`,`nfc_id`,`stu_name`)VALUES('$stuid','$nfcid','$stuname');");
			if ($register_result) {
				$arr = array(
					"code" => 2, 
					"msg"=>"注册成功，请核对信息：",
					"obj"=>array(
						"stuId"=>$stuid,
						"stuName"=>$stuname
						)
					);
				$strr = json_encode($arr);
				echo $strr;
			}
		}
	}else{
		if($class_info){
			$stu2id = $consult_stu['0'];
			$stu2name = $consult_stu['2'];
			var_dump($stu2id);
			var_dump($stu2name);
			$result = mysql_query("INSERT INTO `stu`(`stuid`, `Stuname`, `keyword`) VALUES ('$stu2id','$stu2name',$keyword);");
			if ($result){
				$arr = array(
				    	"code" => 1, 
				    	"msg" =>"点名成功，请核对信息：",
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
					"msg" =>"点名失败,请重试："
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
