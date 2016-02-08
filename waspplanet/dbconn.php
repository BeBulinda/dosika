<?php
//session_start(); 
if(!isset($_SESSION)){
    session_start();
}
date_default_timezone_set('Africa/Nairobi');
$current_file = $_SERVER['SCRIPT_NAME'];
$host="192.168.7.24:2208";
$datab = "dosika_rising";
$user = "kk1wasp";
$passw = "1kkwasp";
$connect = mysql_pconnect($host, $user, $passw); /*or die('ERROR IN DATABASE CONNECTION');*/

if($connect){
//echo" Connected!";
$d_connect = mysql_select_db($datab);
    if($d_connect){
        //echo "Database Selected!";
    }else {echo "But Database Not SELECTED!";}
}else{echo "Not connected!";}
?>
