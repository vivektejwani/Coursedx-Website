<?php
	session_start();
	require '../mysql.inc.conn.php';
	$f_id=$_SESSION['id'];
	$query1="SELECT `r_id`,`s_id`,`c_id`,`request_info` from `requests` where `f_id`='".$f_id."'";
	$query_result1=@mysql_query($query1);
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset='UTF-8'>
	
	<title>Requests</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="stylesheet" href="css/style.css">
</head>

<body>

	<div id="page-wrap">

	<h1 align="center"><?php echo 'Requests for Faculty Number '.$f_id;?></h1>
		<br>
	<table>
		<tr>
			<th width="15%">Request <br>
		    ID</th>
			<th width="13%">First<br>
		    Name</th>
			<th width="21%">Last<br>
			  Name</th>
			<th width="25%">Course Name</th>
            <th width="26%">Request</th>
		</tr>
        <?php while($row1=@mysql_fetch_row($query_result1))
		{
			echo '<tr>';
			echo '<td>';
			echo $row1[0];
			echo '<td>';
			$query2="SELECT `name`,`surname` from `student` where `s_id`='".$row1[1]."'";
			$query_result2=@mysql_query($query2);
			$row2=@mysql_fetch_row($query_result2);
			echo $row2[0];
			echo '<td>';
			echo $row2[1];
			echo '<td>';
			$query2="SELECT `name` from `courses` where `c_id`='".$row1[2]."'";
			$query_result2=@mysql_query($query2);
			$row2=@mysql_fetch_row($query_result2);
			echo $row2[0];
			echo '<td>';
			echo $row1[3];
			echo '</tr>';			 
		}
		?>
		
	</table>
	
	</div>
		
</body>

</html>