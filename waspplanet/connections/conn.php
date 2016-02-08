<?php

error_reporting(0);

# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$host = "localhost";
$database = "mobilehealth";
$username = "root";
$password = "";
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$database")or die("cannot select DB");
?>
