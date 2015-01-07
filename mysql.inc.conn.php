<?php

	@mysql_connect('localhost','root','') or die("Couldn't connect to the MySQL Server!");
	@mysql_select_db('reg_sys') or die("Couldn't connect to the specified database!");
	?>