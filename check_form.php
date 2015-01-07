<?php
	require 'mysql.inc.conn.php';
	session_start();
	$s_id=1;
?>
<html>
<body>
<form method="post" action="">
<select name="taskOption">
      <?php
	$query="SELECT `name` from `faculty`";
	$query_result=mysql_query($query);
	while($row=mysql_fetch_row($query_result))
	{
		echo '<option value="'.$row[0].'">'.$row[0].'</option>';
	}
?>
</select>
<br>
Faculty Name : <br /><select name="faculty_request">
      <?php
	  $query5="SELECT `c_id` from `student_courses` where `s_id`='".$s_id."'";
	  
	  		$query_result5=mysql_query($query5);
			while($row5=mysql_fetch_row($query_result5))
			{
				$query7="SELECT `name`,`f_id` from `faculty` where `f_id`=(SELECT `f_id` from `courses` where `c_id`='".$row5[0]."')";
				echo 'This works'; $query_result7=mysql_query($query7);
				$row7=mysql_fetch_row($query_result7);
				echo '<option value="'.$row7[1].'">'.$row7[0].'</option>';
			}
	  
		?>
</select>
<input type="submit" name="submit" value="Submit the form">
</form>
</body>
</html>