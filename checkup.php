<?php
	require_once 'config.php';

	$con = mysql_connect($_PICK[ 'db_server' ].':'.$_PICK['db_port'],$_PICK[ 'db_user' ],$_PICK[ 'db_password']);
	$db_selected = mysql_select_db($_PICK[ 'db_database' ], $con);
	mysql_query("set names utf8");
	if (isset($_REQUEST['check'])) {
		//var_dump($_REQUEST['classname']);
		//var_dump($_REQUEST['classid']);
		$consult_key = //mysql_query("SELECT keyword FROM 'datas' WHERE classname = '".$_REQUEST['classname']."' AND classid = ".$_REQUEST['classid'].";");
		mysql_query("SELECT keyword FROM  `datas` WHERE classname =  '".$_REQUEST['classname']."' AND classid =".$_REQUEST['classid']);
		$result_keyword = mysql_fetch_array($consult_key);
		//echo $result_keyword['keyword'];
		$consult = mysql_query("SELECT DISTINCT stuid,stuname FROM `stu` where keyword=".$result_keyword['keyword'],$con);
		echo "到课信息如下：<br>";
		while ( $result = mysql_fetch_array($consult)) {
		echo "<tr>";
			echo $result[0]."</tr><tr>".$result[1]."<br>";
			 // foreach ($result as $data) {
				// echo $data;		
				// }
				// print_r($result);
			}
		echo "</tr>";
	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;"/>
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
			<li>
				<a href="http://4.jizhen.applinzi.com/" target="_blank">2048</a>
			</li>
		</ul>
	    </li>
	    </li>
	</div>
		</div> 
		<div id="call"><br/><br/>
			
		<form action="?check" method="post">
			
			课程名称:<input type="text" name="classname"><br>
			课程节次:<input type="text" name="classid"><br>
	        	<!--口令:<input type="text" name="keyword"><br>-->
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
	<div id="checked"><br/><br/>
			
	<form action="?check" method="post">
		
		课程名称:<input type="text" name="classname"><br>
		课程节次:<input type="text" name="classid"><br>
        	<!--口令:<input type="text" name="keyword"><br>-->
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


