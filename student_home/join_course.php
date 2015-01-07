<?php
	session_start();
	require '../mysql.inc.conn.php';
	$s_id=$_SESSION['id'];
	$c_name=$_GET['name'];
	$query1="SELECT `fees`,`c_id` from `courses` where `name`='".$c_name."'";
	$query_result1=@mysql_query($query1);
	$row1=@mysql_fetch_row($query_result1);
	$fees=$row1[0];
	$c_id=$row1[1];
	$query2="SELECT `account_bal`,`account_no` from `student` where `s_id` = '".$s_id."'";
	$query_result2=@mysql_query($query2);
	$row2=@mysql_fetch_row($query_result2);
	$opening_bal_s=$row2[0];
	$acc_no_student=$row2[1];
	$msg='Transaction in progress...';
	$query3="SELECT `acc_bal`,`acc_no` from `faculty where `f_id`= (SELECT `f_id` from `courses` where `name`='".$c_name."')";
	$query_result3=@mysql_query($query3);
	$row3=@mysql_fetch_row($query_result3);
	$opening_bal_f=$row3[0];
	$acc_no_faculty=$row3[1];
	if($fees>$opening_bal_s)
	{
		$msg='Transaction failed due to insufficient funds!';
	}
	else
	{
		$closing_bal_s=$opening_bal_s-$fees;
		$closing_bal_f=$opening_bal_f+$fees;
		mysql_query("START TRANSACTION");
		$a1 = mysql_query("UPDATE `student` SET `account_bal`='".$closing_bal_s."' WHERE `s_id`='".$s_id."'");
		$a2 = mysql_query("UPDATE `faculty` SET `acc_bal`='".$closing_bal_f."' WHERE `f_id`= (SELECT `f_id` from `courses` where `name`='".$c_name."')");
		$a3 = mysql_query("INSERT INTO `student_course`(`s_id`, `c_id`) VALUES ('".$s_id."','".$c_id."')"); 
		if ($a1&&$a2&&$a3) 
		{
    		mysql_query("COMMIT");
			$msg="Transaction Successful!";
		}	 
		else 
		{
			if(!$a1)
			{
				echo 'a1 failed<br>';
			}
			if(!$a2)
			{
				echo 'a2 failed<br>';
			}
			if(!$a3)
			{
				echo 'a3 failed<br>';
			}
    		mysql_query("ROLLBACK");
			$msg="Transaction Failed!";
		}	
	}
?>
<head>
<meta charset="utf-8">
<title>Join new course</title>
</head>

<body>
<h2> <span style="text-align: center"><?php echo $msg; ?></span> </h2>
<br>
<br>
<p>
<a href="../index.php">Click here</a> to go back..
</p>
</body>
</html>