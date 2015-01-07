<?php
	session_start();
	require '../mysql.inc.conn.php';
	$f_id=$_SESSION['id'];
	$c_name=htmlspecialchars($_GET['name']);
	$query1="SELECT `c_id` from `courses` where `name`='".$c_name."'";
	$query_result1=@mysql_query($query1);
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset='UTF-8'>
	
	<title>Students Enrolled</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="stylesheet" href="css/style.css">
</head>

<body>

	<div id="page-wrap">

	<h1 align="center"><?php echo 'Students for Course : '.$c_name;?></h1>
		<br>
	<table>
		<tr>
			<th width="15%">Student<br>
		    ID</th>
			<th width="16%">First Name</th>
			<th width="20%">Last Name</th>
			<th width="23%">Allot Marks</th>
            <th width="26%">Drop from course</th>
		</tr>
        <?php $row1=@mysql_fetch_row($query_result1);
		$query2="SELECT `s_id` from `student_course` where `c_id`='".$row1[0]."'";
		$query_result2=@mysql_query($query2);
		while($row2=@mysql_fetch_row($query_result2))
		{
			$query3="SELECT `s_id`,`name`,`surname` from `student` where `s_id`='".$row2[0]."'";
			$query_result3=@mysql_query($query3);
			$row3=@mysql_fetch_row($query_result3);
			echo '<tr>';
			echo '<td>';
			echo $row3[0];
			echo '<td>';
			echo $row3[1];
			echo '<td>';
			echo $row3[2];
			echo '<td>';
			echo '<a href="../allot_marks.php/?s_id='.$row3[0].'&c_id='.$row1[0].'">';
			echo 'Allot Marks!</a>';
			echo '<td>';
			echo '<a href="../drop_student.php/?s_id='.$row3[0].'&c_id='.$row1[0].'">';
			echo 'Drop Student!</a>';
			echo '</tr>';			 
		}
		?>
		
	</table>
	
	</div>
		
</body>

</html>