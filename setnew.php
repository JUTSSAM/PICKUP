<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
	<meta http-equiv="content-type" content="text/html" /><meta charset="utf-8" />
	<link href="images/dmsj.ico" type="image/x-icon" rel="shortcut icon" />
	<title>点名时间</title>
	<link href="css/index.css" rel="stylesheet" type="text/css" />
</head>
<body>
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
	    </li></li>
	</div>
			</div> 
		<div id="call"><br/><br/>
			<form action="?check" method="POST">
		
			教师姓名:<input type="text" name="tname" ><br>
			课程名称:<input type="text" name="classname"><br>
			<input type="submit" value="submit"><br>

<?php

require_once 'config.php';

$con = mysql_connect(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);if(!$con){ die('could not connect:'.mysql_error()); }mysql_select_db(SAE_MYSQL_DB,$con);

if(!@mysql_connect($_PICK['db_server'].':'.$_PICK['db_port'],$_PICK['db_user'],$_PICK['db_password'])||!@mysql_select_db($_PICK['db_database']))
{
	die('数据库连接失败<br>');
}else{
	// echo "数据库连接成功<br>";
	}
	mysql_query("set names utf8");

	$keyword = rand(100000,999999);
	$time = time();

	

if (isset($_REQUEST['check'])) {

	$classname = $_REQUEST['classname'];
	$tname = $_REQUEST['tname'];
	

	@$check_result = mysql_query("SELECT `classid` FROM  `datas` WHERE  classname = '".$classname."' AND tname ='".$tname."';",$con);

	@$check_info = mysql_fetch_array($check_result);

 	$classid = $check_info['classid'];
 	if ($check_info) {
 		$classid = $classid + 1;
 	}else{
 		$classid = 1;
 	}

	if(!StrCheck($_REQUEST['tname'])&&!StrCheck($_REQUEST['keyword'])&&!StrCheck($_REQUEST['class'])){
		die("不合法的输入<br>");
	}else{

		if(!$result = mysql_query("INSERT INTO datas (classname,tname,classid,keyword,datetime) VALUES ('$_REQUEST[classname]','$_REQUEST[tname]',$classid,'$keyword',$time);"))
		{
			die('Error'.mysql_error().'<br>');
		}else{
			echo "发布信息如下：<br>";
			echo "课程名称:".$_REQUEST['classname']."<br>";
			echo "教师姓名:".$_REQUEST['tname']."<br>";
			echo "随机口令:".$keyword."<br>";
			
		}
		
	}
}
?>






			</form>
			<a href="checkup.html">查询点名情况</a>
		</div> 
	</div><br/>
	<div style="text-align: center;">created by 秦至</div></div>
<div id="mobile">
	<div id="header">
		<span>点名</span>
	</div>
	<div id="teacher">
		<form action="setnew.php" method="POST" name="Set">		
				<input type="text" name="tname" placeholder="教师姓名"><br/><br/>
				<input type="text" name="classname" placeholder="课程姓名"><br/><br/>
				<input type="submit" id="submit" value="提交"><br>
			</form><br/>
			<a href="checkup.html"><button>查询点名情况</button></a>
	</div> 
	<div id="footer">
		<span>本系统由物光院开发</span>
	</div>
</div>
<script type="text/javascript" src="js/jQuery.js"></script>
<script type="text/javascript" src="js/index.js"></script>
</body>
</html>

