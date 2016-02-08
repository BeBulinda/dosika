<?php
$myServer = '192.168.7.25:5070';
$myUser = 'appNew';
$myPass = '1appNew23';
$myDB = 'Subscription'; 
/*
$connectionInfo = array( "Database"=>"$myDB", "UID"=>"$myUser", "PWD"=>"$myPass");
$$dbhandle = sqlsrv_connect( $myServer, $connectionInfo);
if( $$dbhandle === false ) {
    die( print_r( sqlsrv_errors(), true ));
}
*/
//connection to the database
$dbhandle = mssql_connect($myServer, $myUser, $myPass);// or die(mssql_get_last_message());
  //or die("Couldn't connect to SQL Server on $myServer"); 

//select a database to work with
$selected = mssql_select_db($myDB, $dbhandle);
  //or die("Couldn't open database $myDB"); 
?>
