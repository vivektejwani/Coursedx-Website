<?php
	require '../mysql.inc.conn.php';
	session_start();
	$s_id=$_GET['s_id'];
	$c_id=$_GET['c_id'];
	if(isset($_POST['quiz1'])&&isset($_POST['quiz2'])&&isset($_POST['mid_sem'])&&isset($_POST['end_sem']))
	{
		echo $quiz1=$_POST['quiz1'];
		echo $quiz2=$_POST['quiz2'];
		echo $mid_sem=$_POST['mid_sem'];
		echo $end_sem=$_POST['end_sem'];
		$query="UPDATE `student_course` SET `quiz1`='".$quiz1."',`quiz2`='".$quiz2."',`mid_sem`='".$mid_sem."',`end_sem`= '".$end_sem."' WHERE `s_id`='".$s_id."' and `c_id`= '".$c_id."'";
		$query_result=mysql_query($query);
		header('Location: ../index.php');
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Allot Marks</title>
</head>

<body>
<h1 align="center">Allot marks</h1>
<form action="<?php echo '../allot_marks.php/?s_id='.$s_id.'&c_id='.$c_id; ?>" method="POST"><br>
Quiz 1 : <input type="number" name="quiz1" value="0"><br><br>
Quiz 2 : <input type="number" name="quiz2" value="0"><br><br>
Mid sem : <input type="number" name="mid_sem" value="0"><br><br>
End sem : <input type="number" name="end_sem" value="0"><br><br>
<input type="submit" name="submit">
 </form>
</body>
</html>