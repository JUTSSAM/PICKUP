<?php 
	require_once 'config.php';
	$con = mysql_connect($_PICK[ 'db_server' ],$_PICK[ 'db_user' ],$_PICK[ 'db_password']);
	$db_selected = mysql_select_db($_PICK[ 'db_database' ], $con);
	mysql_query("set names utf8");
	$result = mysql_query("SELECT datetime,classname,tname,keyword FROM `datas` ");
	
	//date_format($result[0],'%b %d %Y %h:%i %p');	
	//mysql_fetch_array($result);
	// mysql_close($con);
	// echo "<br>time-classname-tname";
	
	while($row = mysql_fetch_row($result)){
		echo "<br>";

		// foreach ($row as $data) {
		// 	if (is_int($data)&&($data>1000000) ){
		// 		echo date('Y-m-d',$data);
		// 		# code...
		// 	}else{
		// 		echo $data." ";	
		// 	}	
		// }
		?>

		<tr>

		<td><?
		echo date('Y-m-d',$row[0]).' | '.$row[1].' | '.$row[2].'|'.$row[3];
		echo "<a herf=>";

		echo "<br>";
		?>

		<td><label>

			<input type="hidden" name="keyword" value="<?php echo $row[3]; ?>">
			<div align="center"><a href="join.php?keyword=<?php echo $row[3]; ?>">加入</a></div>

		</label></td>
		
		</tr>
		<?php
	}
	
	// echo 
	// "<!DOCTYPE html>
	// <html>
	// <head>
	// 	<title>Recent Published</title>
	// </head>
	// <body>
	// </body>
	// </html>";
	 ?>