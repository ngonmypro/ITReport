<?php
	$host="localhost";
	$user="root";
	//$pw="30323";
	$pw="30323";


	$dbname="dbdesign";

	$c=mysql_connect($host,$user,$pw); //เชื่อมตอ
	mysql_select_db($dbname,$c); //เลือกติดต่อกับฐานข้อมูลที่กำหนด
	mysql_query("set names utf8");
	
 	if(!$c){
		echo"<h3>Can't connect database!</h3>";
		exit();
	}else{
		//echo"<h3>connect database is success</h3>";
	}
 ?>
