<?php
include('dbconn.php');
if(isset($_POST['submit'])!=""){
	$u_id = time();
    $username = $_POST['username'];
    $email = $_POST['email'];
    $cell = $_POST['cell'];
    $password = md5($_POST['password']);
    $t_conditions = $_POST['TC'];
    $active = 0;
    
    $insert=mysql_query("INSERT INTO subscriber(u_id, username, email, cell, password, TC, active) 
                    VALUES ('$u_id', '$username', '$email', '$cell', '$password', '$t_conditions', '$active')"); 
                    if($insert){
					Header("Location:vconfirmation.php");
        
            $subject = 'CONFIRMATION CODE';
            $body = "This is your user confirmation code. " . $u_id. "\n\n Welcome to Dosika Rising Stars Platform.";
            $headers = 'From: WASP AFRICA <it@waspafrica.com>';

            if(mail($email, $subject, $body, $headers)){
	           echo'Email has been sent to  '. $email;
            } else {
	           echo 'There was an error sending the email.';
            }
}
}
                        
                        
                        
                        
                        
                        
	
?>