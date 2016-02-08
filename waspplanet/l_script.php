<?php
   if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        //$username = stripslashes($username);
        /*$username = mysql_real_escape_string($username);
        $password = stripslashes($password);
        $password = mysql_real_escape_string($password);*/
        $sql="SELECT `username` FROM `artiste` WHERE `username`='$username' AND `password`='$password'";
            $result = mysql_query($sql);
            
            
            if(mysql_fetch_assoc($result) == 1){
                //session_register("username");
                header("location:upload.php");
            }
            else{
                echo "Wrong Username and Password" . $password;
            }
   }
?>

if (mysql_num_rows($q) == 1)
        {
     $user_data = mysql_fetch_assoc($q);    
     $_SESSION['username'] = $username;