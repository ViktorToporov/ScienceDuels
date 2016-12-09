<?php

	
	error_reporting( ~E_ALL & ~E_DEPRECATED &  ~E_NOTICE );
	
	
	define('DBHOST', 'localhost:3306');
	define('DBUSER', 'crazyde_SD_users');
	define('DBPASS', 'users123');
	define('DBNAME', 'crazyde_SD_users');
	
	$conn = mysql_connect(DBHOST,DBUSER,DBPASS);
	$dbcon = mysql_select_db(DBNAME);
	
	if ( !$conn ) {
		die("Connection failed : " . mysql_error());
	}
	
	if ( !$dbcon ) {
		die("Database Connection failed : " . mysql_error());
	}
?>