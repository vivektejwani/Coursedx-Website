<?php 
	session_start();
	$s_id=$_SESSION['id'];
	
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Student Homepage</title>
<style type="text/css">
body {
	background-image: url(faculty_home/images/templatemo_body.jpg);
	color: #000;
}
</style>
</head>

<body>
<h1 align="center"><?php echo 'Welcome student number : '.$s_id;?></h1>
<br>
<br>
<br>
<h2><a href="drop_courses.php" style="color: #FFF"> Drop Courses ? </a></h2>
<h2><a href="new_courses.php" style="color: #FFF"> Enroll for more courses? </a></h2>
<h2><a href="send_request.php" style="color: #FFF"> Send request to faculty?</a></h2>

</body>
</html>