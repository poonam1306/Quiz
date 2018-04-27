<?php

	$servername = "localhost";
	$username = "root";
	$password = "";
	
	$db_name = "data";
	
	$link =mysqli_connect($servername, $username, $password, $db_name) or die("Could not Connect My Sql");;
	$db = mysqli_select_db($link,$db_name) or die("Could connect to Database");
	
	
		function getsubname($sub_id,$link){
		$query = "select * from subject where sub_id=$sub_id";
		$result = mysql_query($query,$link);
		$row = mysql_fetch_array($result);
		return $row['sub_name'];
	}
?>
