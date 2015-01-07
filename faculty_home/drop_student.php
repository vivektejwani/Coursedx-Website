<?php
	session_start();
	require '../mysql.inc.conn.php';
	$s_id=$_GET['s_id'];
	$c_id=$_GET['c_id'];
	$query="DELETE from `student_course` where `s_id`='".$s_id."' and `c_id` = '".$c_id."'";
	$query_result=mysql_query($query);
	
	header('Location: ../index.php');
?>
