<?php
$to = "bellarmine16@yahoo.com";
$subject = 'PAYMENT REQUEST CONFIRMATION';
$body = "Payment requested by\n\n UserID: ";
$headers = 'From: WASP AFRICA <wasp@waspafrica.com>';

    if(mail($to, $subject, $body, $headers)){
            echo'Email has been sent to  '. $to;
            } else {
            echo 'There was an error sending the email.';
            }
?>  