<?php

	require_once 'config.php';

	$con = mysql_connect($_PICK[ 'db_server' ].':'.$_PICK['db_port'],$_PICK[ 'db_user' ],$_PICK[ 'db_password']);
	$db_selected = mysql_select_db($_PICK[ 'db_database' ], $con);
	mysql_query("set names utf8");

	$keyword = $_POST['keyword'];
	$consult_keyword = mysql_query("SELECT datetime,classname,tname  FROM `datas` WHERE keyword='".$keyword."'",$con);
	$class_info = mysql_fetch_array($consult_keyword);
	$nfcid = $_POST['nfcId'];
	$nfcid = substr($nfcid,0,8);

	$consult_stu = mysql_query("SELECT `stu_id`,`nfc_id`,`stu_name`FROM `stu2` WHERE `nfc_id` ='".$nfcid."'",$con);
	$stu_info = mysql_fetch_array($consult_stu);

	$stuid = $_POST['stuId'];
	$stuname = $_POST['stuName'];

	if (!$stu_info)
	{
		if (!($stuid&&$stuname)) {
		$arr = array(
			"code"=>1,
			//"msg"=>"输入信息不完整，请检查！"
			);
		$strr = json_encode($arr);
		echo $strr;		
		}else{
			$register_result = mysql_query("INSERT INTO `stu2`(`stu_id`,`nfc_id`,`stu_name`)VALUES('$stuid','$nfcid','$stuname');");
			if ($register_result) {
				$arr = array(
					"code" => 2, 
					//"msg"=>"注册成功，请核对信息：",
					// "obj"=>array(
					// 	"stuId"=>$stuid,
					// 	"stuName"=>$stuname
					// 	)
					);
				$strr = json_encode($arr);
				echo $strr;
			}
		}
	}else{
		if($class_info){
			$stu2id = $stu_info['0'];
			$stu2name = $stu_info['2'];
			$result_repeat = mysql_query("SELECT *  FROM `stu` WHERE keyword='".$keyword."' and stuid ='".$stu2id."';",$con);
			$repeat_info = mysql_fetch_array($result_repeat);

			if ($repeat_info) {
				die();	
			}

			$result = mysql_query("INSERT INTO `stu`(`stuid`, `Stuname`, `keyword`) VALUES ('$stu2id','$stu2name',$keyword);");
			if ($result){
				$arr = array(
				    	"code" => 3, 
				    	//"msg" =>"点名成功，请核对信息：",
				    	"obj" => array(
				    		"tName" => $class_info[2] ,
				    		"className" => $class_info[1]
				    		)
			    		);
			    	$strr = json_encode($arr);	
				echo $strr;
			}else{
				$arr = array(
					"code" => 4,
					//"msg" =>"点名失败,请重试："
					);
				$strr = json_encode($arr);
				echo $strr;
			}
		}else{
			$arr = array(
				"code" => 0,
				//"msg" =>"口令错误"
				);
			$strr = json_encode($arr);
			echo $strr;
		}
}
?>
