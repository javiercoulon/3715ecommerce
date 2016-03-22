<?php
	error_reporting(0);//won't show any error
	//the first try is the default one, mysql from mun
	$host="mysql.cs.mun.ca";
	$username="cs3715_fjco67";
	$password="bluedoor99";
	$dbname="cs3715_fjco67";

	$db = mysqli_connect($host,$username,$password,$dbname);

	// Check connection (if not, we try the second and last time)
	if (!$db)
	  {
	  	//try with a local account
	  	$host="localhost";
		$username="<YOURUSERNAME>";
		$password="<YOURPASSWORD>";

		$db = mysqli_connect($host,$username,$password,$dbname);
	  
		if(!$db){
			 echo "Failed to connect to MySQL: ";
		     return;
		}
	  }
?>