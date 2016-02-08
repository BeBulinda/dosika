<?php include('dbconn.php'); ?>
<?php include('header_info.php'); ?>

<body>
    <fieldset>
        <legend>ENTER YOUR EMAIL</legend>
            <form method="post" action="rsnd_conf.php">
                <input type="email" name="email" placeholder="Your confirmation code will be sent to this email address." class="text" required/>
                <input type="submit" name="submit1" value="SEND CODE"/>
            </form>
    </fieldset>
</body>

<?php 
if(isset($_POST['submit1']) && !empty($_POST['email'])){
    $email = $_POST['email'];
    $check_u_id = mysql_query("SELECT * FROM artiste WHERE `email` = '$email'");
    $found = mysql_num_rows($check_u_id);
        if($found == 1){
            $active = mysql_fetch_assoc($check_u_id);
            if($active['active'] == 0){ 
            $subject = 'CONFIRMATION CODE';
            $body = "This is your user confirmation code. " . $active['u_id']. "\n\n Welcome to Dosika Rising Stars Platform.";
            $headers = 'From: WASP AFRICA <it@waspafrica.com>';

            if(mail($email, $subject, $body, $headers)){
	           echo $active['u_id'].'Email has been sent to  '. $email;
            } else {
	           echo 'There was an error sending the email.';
            }
        }else {echo 'You have already confirmed your registration. <a href="login.php">LOGIN</a>';}
}
}
?>