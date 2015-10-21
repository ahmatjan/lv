<?php
	$database="lv";
	$mysql_user = "root";
	$mysql_password = "root"; 
	$mysql_host = "localhost";
	$mysql_table_prefix = "s_";

	$success = mysql_pconnect ($mysql_host, $mysql_user, $mysql_password);
	mysql_query("set character set 'utf8'");//读库 
	mysql_query("set names 'utf8'");//写库 
	
	if (!$success)
		die ("<b>Cannot connect to database, check if username, password and host are correct.</b>");
    $success = mysql_select_db ($database);
	if (!$success) {
		print "<b>Cannot choose database, check if database name is correct.";
		die();
	}
?>

