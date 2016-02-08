<?php include('dbconn.php'); ?>
<?php include('header_info.php'); ?>

<body>
    <fieldset>
        <legend>ENTER YOUR CODE</legend>
            <form method="post" action="conf.php">
                <input type="text" name="code" placeholder="Enter the number confirmation code." class="text" required/>
                <input type="submit" name="submit" value="CONFIRM ACCOUNT"/>
            </form>
    </fieldset>
</body>

<?php 
if(isset($_POST['submit']) && !empty($_POST['code'])){
    $code = $_POST['code'];
    $check_u = mysql_query("SELECT * FROM artiste WHERE `u_id` = '$code'");
    $found = mysql_num_rows($check_u);
    
        if($found == 1){//Confirmation code check
            $activ = mysql_fetch_assoc($check_u);
            if($activ['active'] == 1){
               echo 'You have already confirmed your registration. <a href="login.php">LOGIN</a>';
                            
        }else {
                $update = mysql_query("UPDATE `artiste` SET `active`= '1' WHERE `u_id` = '$code'");
                echo 'Account confirmed. <a href="login.php">LOGIN</a>';
                
                }
}
}
?>