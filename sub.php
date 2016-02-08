
<script src="js/vdo_pop.js"></script>
<?php
$myServer = '192.168.7.25:5070';
$myUser = 'appNew';
$myPass = '1appNew23';
$myDB = 'Subscription';  
//connection to the database
$dbhandle = mssql_connect($myServer, $myUser, $myPass);
$dbhandleX= mssql_connect($myServer, $myUser, $myPass);
//select a database to work with
$selected = mssql_select_db($myDB, $dbhandle);
$selectedX= mssql_select_db($myDB, $dbhandleX);
date_default_timezone_set('Africa/Nairobi');
$now=date('Y-m-d H:i:s');

error_reporting(0);
//error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', true);
session_start(); 
include '../conn/functions.php';
include '../conn/conn_x.php';

    echo '<b style="color:#000;" >Please enter your mobile number below</b>';
    echo '<p style="color:#000;" >Mobile No:</p>';
    echo '<form action="sub.php" method="POST">';
    echo '<input  style="color:#000;" name="mobilenum" id="mobilenum" type="text" size="13" maxlength="12" />';
	echo '<input  style="color:#000;" name="type_id" id="type_id" value="21" type="hidden"/>';
	echo '<input  style="color:#000;" name="subscribe" type="submit" value="Subscribe/Request" />';
	echo '</form>';
	echo '<p><a href="sms:+21205">&laquo;&laquo;<b>DOSIKA</b></a></p>';
    
if(isset($_POST['subscribe'])){
    
	//put logic here after submit
	if(strlen($_POST['mobilenum'])==0){
		echo '<div class="container"><div class="news-paper"><div class="sign_up text-center">Please enter your phone number.';
		echo '<p><a href="input.php">&laquo;&laquo;<b>Click here</b></a> to go back and retry.</p></div></div></div>';
		
	}else{
		//validate number
		if(strlen($_POST['mobilenum'])<9){
			echo '<div class="container"><div class="news-paper"><div class="sign_up text-center">Invalid Phone number. Please re-enter your number.';
			echo '<p><a href="input.php">&laquo;&laquo;<b>Click here</b></a> to go back and retry.</p></div></div></div>';
		}else{
			$phone_num="+254".substr($_POST['mobilenum'], -9);
			

			$sent = mssql_query("insert into ozekimessageout (sender, receiver, msg, scheduledtime, flag, status) values ('21208', '$phone_num', 'Welcome to DOSIKA. To begin, send SEARCH to 21208, now!', '$now', '0', 'send')", $dbhandleX); 
            
                if($sent){
                    echo 'Your Number is Added. Please Wait for a text message.<br/>';
                    echo '<a href="http://www.dosika.co.ke">Click here to go back....</a>';
                    echo '<a href="http://www.waspafrica.com">Click here to waspafrica.com</a>';
                }else{
                    echo 'NOT SENT';
                }
			}
			
        }
}
                                                                                                    
	
   
?>