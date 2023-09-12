<!--
    Author: Group
    Date: 2023.02.16
-->
<?php
    $hostname = 'localhost';
	$username = 'mechanic';
	$password = 'D13s3l;T3sla';

	$dbname = 'mechanic_';

	$con = mysqli_connect($hostname, $username, $password, $dbname);

	if (!$con)
	{
		die('Failed to connect to MySQL: ' . mysqli_connect_error());
	}
?>