<?php
require 'mysql.inc.conn.php';
$query1="SELECT `name`,`duration`,`discipline` from `courses`";
    $query_result1=mysql_query($query1)
;
$query2="SELECT `fees`,`duration`,`discipline` from `courses`";
    $query_result2=mysql_query($query2)
;
$query3="SELECT `duration`,`duration`,`discipline` from `courses`";
    $query_result3=mysql_query($query3)
;
$query4="SELECT `discipline`,`duration`,`discipline` from `courses`";
    $query_result4=mysql_query($query4)
;
echo @mysql_result($query_result2,1,`fees`);echo "<br>";
echo @mysql_result($query_result2,2,`fees`);echo "<br>";
echo @mysql_result($query_result3,0,`duration`);echo "<br>";
echo @mysql_result($query_result3,0,`duration`);
?>
