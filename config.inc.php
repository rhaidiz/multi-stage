<?php
		/*** mysql hostname ***/
		$hostname = '127.0.0.1';
		
		/*** mysql username ***/
		$username = 'chaineddb';
		
		/*** mysql password ***/
		$password = 'chainedpwd';
		
		$dbname = 'chained';
		
		$conn = mysql_connect($hostname, $username, $password);
		mysql_select_db($dbname,$conn);
		
		
		
?>
