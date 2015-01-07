<?php
	session_start();
	require '../mysql.inc.conn.php';
	$s_id=$_SESSION['id'];
	if(isset($_POST['faculty_request'])&&isset($_POST['course_request'])&&isset($_POST['request_info'])&&!empty($_POST['faculty_request'])&&!empty($_POST['course_request'])&&!empty($_POST['request_info']))
	{
		 $f_id=$_POST['faculty_request'];
		 $c_id=$_POST['course_request'];
		 $request=$_POST['request_info'];			
		 $query="INSERT INTO `requests`(`s_id`, `f_id`, `c_id`, `request_info`) VALUES ('".$s_id."','".$f_id."','".$c_id."','".$request."')";
		 $query_result=@mysql_query($query);
		 header('Location: index.php');
	}
	else
	{
		die('Not all required fields are entered');
		for($x=0;$x<50000;$x++){}
		header('Location: index.php');
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
</body>
</html>