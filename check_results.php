<?php
require 'mysql.inc.conn.php';
$query="SELECT `name`,`c_id`,`duration`,`discipline` from `courses`";
$query_result=mysql_query($query);
while($row = mysql_fetch_row($query_result))
{
	echo $row[0];
	echo '	';
	echo $row[1];
	echo '	';
	echo $row[2];
	echo '	';
	echo $row[3];
	echo '<br>';
}
?>