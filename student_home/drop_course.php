<?php
	require '../mysql.inc.conn.php';
	session_start();
	$s_id=$_SESSION['id'];
	$c_name=htmlspecialchars($_GET['name']);
	$query="SELECT `c_id` from `courses` where `name`='".$c_name."'";
	$query_result=@mysql_query($query);
	$row=@mysql_fetch_row($query_result);
	$c_id=$row[0];
	$query2="DELETE FROM `student_course` where `c_id`='".$c_id."' and `s_id`= '".$s_id."'";
	$query_result2=@mysql_query($query2);
	
	
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Dropping Course</title>
</head>

<body>
<p style="text-align: center">
Deletion performed..<a href="../index.php">Click here</a> to go back</p>
</body>
</html>