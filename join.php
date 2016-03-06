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

if (isset($_REQUEST['check'])) {
	echo "<div id=\"info\">";
	$consult = mysql_query("SELECT datetime,classname,tname  FROM `datas` WHERE keyword='".$_REQUEST['keyword']."'",$con);
	$row = mysql_fetch_array($consult);
	$stuid = $_REQUEST['stuid'];
	$stuname = $_REQUEST['stuname'];
	$keyword = $_REQUEST['keyword'];
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
	echo "</div>";
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
	<meta http-equiv="content-type" content="text/html" /><meta charset="utf-8" />
	<link href="images/dmsj.ico" type="image/x-icon" rel="shortcut icon" />
	<title>点名时间</title>
	<link href="css/index.css" rel="stylesheet" type="text/css" />
</head>
<body  onselectstart="return false">
<div id="pc_html" style="background:url(images/bj.gif);">
	<div id="header">
	    <img src="images/xd.jpg" />
	    <b id="logo">西电点名系统</b>
		<span id="time"></span>
		<a target="_blank" href="http://www.hao123.com/rili" id="alltime">万年历</a><br/>
		<img src="images/head.jpg"/>
	</div>
	<div id="container">
		 <div id="news">
		    <a href="http://xt.xidian.edu.cn/G2S/ShowSystem/Index.aspx" target="_blank"><img src="images/xdxt.jpg"/></a>
		    <a href="http://jwc.xidian.edu.cn/tzgg1.htm" target="_blank"><img src="images/index17.jpg"/></a>
			<div id="catalog">
        <li>
		<h3 title="哦，它是名站！"><img src="images/below.gif" />名站导航</h3>
		<ul>
			<li>
			<a href="https://www.baidu.com/" target="_blank">百度</a>&nbsp;
			<a href="http://www.sina.com.cn/" target="_blank">新浪</a>&nbsp;
			<a href="https://www.tmall.com/" target="_blank">天猫</a>&nbsp;
			<a href="http://www.qq.com/" target="_blank">腾讯</a><br/>
			<a href="http://www.sohu.com/" target="_blank">搜狐</a>&nbsp;
			<a href="http://www.163.com/" target="_blank">网易</a>&nbsp;
			<a href="http://www.163.com/" target="_blank">淘宝</a>&nbsp;
			<a href="https://www.jd.com/" target="_blank">京东</a>
			</li>
		</ul>
		</li>
		<li>
		<h3 title="生活在西电"><img src="images/below.gif" />西电导航</h3>
		<ul>
			<li>
				<a href="http://www.xidian.edu.cn/" target="_blank">西电主页</a>&nbsp;
				<a href="http://jwc.xidian.edu.cn/" target="_blank">西电教务处</a>
			</li>
			<li>
				<a href="http://news.xidian.edu.cn/" target="_blank">西电新闻</a>&nbsp;
				<a href="http://www.lib.xidian.edu.cn/" target="_blank">西电图书馆</a>
			</li>
		</ul>
		</li>
		<li>
		<h3 title="友情链接"><img src="images/below.gif" />友情链接</h3>
		<ul>
			<li>
				<a href="http://dean.xjtu.edu.cn/" target="_blank">西交大教务处</a>&nbsp;
				<a href="http://jiaowu.nwpu.edu.cn/" target="_blank">西工大教务处</a>
			</li>
			<li>
				<a href="http://jwc.snnu.edu.cn/" target="_blank">陕师大教务处</a>&nbsp;
				<a href="http://www.xahu.edu.cn/"target="_blank">长安大学教务处</a>
			</li>
		</ul>
		<li>
		<h3 title="点完名，休息下"><img src="images/below.gif" />休闲娱乐</h3>
		<ul>
			<li><a href="http://4.jizhen.applinzi.com/" target="_blank">2048</a></li>
		</ul>
	    </li>
	    </li>
	</div>
			</div> 
		<div id="call"><br/><br/>
			<form action="?check" method="post">
			
			学号:<input type="text" name="stuid" ><br>
			姓名:<input type="text" name="stuname"><br>
	        		口令:<input type="text" name="keyword"><br>
			<input type="submit" value="提交"><br>
			
			</form>
		</div> 
	</div><br/>
	<div style="text-align: center;">created by 秦至</div>
</div>
<div id="mobile">
	<div id="header">
		<span>点名</span>
	</div>
	<div id="content">
		<form action="?check" method="post">
		
		学号:<input type="text" name="stuid" ><br>
		姓名:<input type="text" name="stuname"><br>
        		口令:<input type="text" name="keyword"><br>
		<input type="submit" value="提交"><br>
		
	</form>
	</div>
	<div id="footer">
		<span>本系统由物光院开发</span>
	</div>
</div>
<script type="text/javascript" src="js/jQuery.js"></script>
<script type="text/javascript" src="js/index.js"></script>
</body>
</html>


