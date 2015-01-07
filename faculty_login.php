<?php
	require 'mysql.inc.conn.php';
	session_start();
	$error_msg="";
	if(isset($_SESSION['id'])&&isset($_SESSION['type']))
	{
		if($_SESSION['type']=='f')
		{
		header('Location: faculty_home/index.php');
		}
	}
	else
	{
		if(isset($_POST['login'])&&isset($_POST['password']))
		{
			$log_id=$_POST['login'];
			$pwd=$_POST['password'];
			
			if(!empty($log_id)&&!empty($pwd))
			{
				$error_msg="";
				
				$query1="SELECT `login` from faculty where `login`='".$log_id."'";
				$query_result1=mysql_query($query1);
				$query_num_rows1=mysql_num_rows($query_result1);
				if($query_num_rows1==0)
				{
					$error_msg="Please enter a valid username/password ";
				}
				else
				{
					$query2="SELECT `password` from faculty where `login`='".$log_id."'";
					$query_result2=mysql_query($query2);
					$pwd_found=mysql_result($query_result2,0,`password`);
					if($pwd_found==md5($pwd))
					{
						$query3="SELECT `f_id` from faculty where `login`='".$log_id."'";
						$query_result3=mysql_query($query3);
						$id=mysql_result($query_result3,0,`f_id`);
						
						$_SESSION['id']=$id;
						$_SESSION['type']='f';
						header('Location: faculty_home/index.php');
					}
					else
					{
						$error_msg="Please enter a valid username/password ";
					}
				}
			}
			else
			{
				 $error_msg="Both the fields must be entered!";
			}
		}
	}
?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Coursedx Faculty Login</title>
  <link rel="stylesheet" href="css/style.css">
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>
<h1 style="font-size: 30px">&nbsp;</h1>
<h1 style="font-size: 30px">&nbsp;</h1>
<h1 style="font-size: 30px">Welcome to COURSEDX Faculty Login!</h1>
<hr>
<hr>
<hr>
<form method="post" action="faculty_login.php" class="login">
    <p>
      <label for="login">Login:</label>
      <input type="text" name="login" id="login" value="<?php if(isset($log_id)){
		  echo $log_id;
		  }?>" maxlength="10">
    </p>

    <p>
      <label for="password">Password:</label>
      <input type="password" name="password" id="password" value="">
    </p>

    <p class="login-submit">
      <button type="submit" class="login-button">Login</button>
    </p>

    <p class="forgot-password"><a href="new_reg_faculty.php">New Registration?</a>  </p>
    <p><?php echo $error_msg ?></p>
  </form>
  <section class="about">
    <p> Copyright © 2013 <strong>Coursedx.com</strong> by <a href="https://www.facebook.com/vivek.tejwani.5" rel="nofollow" target="_blank" title="free templates">Vivek</a> and <a href="https://www.facebook.com/VNVMG" rel="nofollow" target="_blank" title="free templates">Abhinav</a>			</p>
</section>
</body>
</html>
