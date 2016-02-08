<?php
error_reporting(0);
$myServer = '192.168.7.25:5070';
$myUser = 'webdoc';
$myPass = 'wasp123';
$myDB = 'wasp_planet'; 

//connection to the database
$dbhandle = mssql_connect($myServer, $myUser, $myPass);
  //or die("Couldn't connect to SQL Server on $myServer"); 

//select a database to work with
$selected = mssql_select_db($myDB, $dbhandle);
  //or die("Couldn't open database $myDB"); 
?>
