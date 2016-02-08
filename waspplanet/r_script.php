<?php
include('dbconn.php');
if(isset($_POST['submit'])!=""){
	$u_id = time();
    $username = $_POST['username'];
    $s_name = $_POST['s_name'];
    $o_name = $_POST['o_name'];
    $email = $_POST['email'];
    $cell = $_POST['cell'];
    $password = md5($_POST['password']);
    $t_conditions = $_POST['TC'];
    $active = 0;
	$c_time = date("Y-m-d H:m:s.u");
    $insert=mysql_query("INSERT INTO artiste(u_id, profile, username, s_name, o_name, email, cell, password, TC, active, date_time) 
                    VALUES ('$u_id', 'NULL', '$username','$s_name', '$o_name', '$email', '$cell', '$password', '$t_conditions', '$active', '$c_time')") or die(mysql_error()); 
                    if($insert){
					Header("Location:confirmation.php");
            $subject = 'CONFIRMATION CODE';
            $body = "Click here http://www.dosika.co.ke/waspplanet/confirmation.php\n\n
            This is your user confirmation code. " . $u_id. "\n\n Welcome to Dosika Rising Stars Platform.";
            $headers = 'From: DOSIKA RISING STARS <it@waspafrica.com>';

            if(mail($email, $subject, $body, $headers)){
	           echo'Email has been sent to  '. $email;
            } else {
	           echo 'There was an error sending the email.';
            }
                    }else{echo "We are having issueswith our server. Please relax and rest assured. No further action is required from your end.!";}
	}
?>