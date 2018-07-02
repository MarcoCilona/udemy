<?php 
	
	/*
		* Setting up the connection to the DB. If it fails break program and print error info.

	*/

	$db['db_host'] = "localhost";
	$db['db_user'] = 'root';
	$db['db_pw'] = '';
	$db['db_name'] = 'cms';

	// save valuese as constants
	foreach ($db as $key => $value) {
		
		define(strtoupper($key), $value);	

	}

	$connection = mysqli_connect(DB_HOST, DB_USER, DB_PW, DB_NAME) 
	or die('Failed to connect to database. <br> Error n°: ' . mysqli_connect_errno()
	 . '<br> Error description: ' . mysqli_connect_error());

	mysqli_set_charset($connection,"utf8");

?>