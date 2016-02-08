<?php include('dbconn.php'); ?>
<?php include('header_info.php'); ?>

    <div class="container">	
        <?php include('menu.php'); ?>
		<div class="news-paper">

    <fieldset>
        <legend>ENTER YOUR CODE</legend>
            <form method="post" action="vconf.php">
                <input type="text" name="code" placeholder="Enter the number confirmation code." class="text" required/>
                <input type="submit" name="submit" value="CONFIRM ACCOUNT"/>
            </form>
    </fieldset>
       
</body>


<?php 
if(isset($_POST['submit']) && !empty($_POST['code'])){
    $code = $_POST['code'];
    $check_u = mysql_query("SELECT * FROM subscriber WHERE `u_id` = '$code'");
    $found = mysql_num_rows($check_u);
    
        if($found == 1){//Confirmation code check
            $activ = mysql_fetch_assoc($check_u);
            if($activ['active'] == 1){
               echo 'You have already confirmed your registration. <a href="vlogin.php">LOGIN</a>';
        }else {
                $update = mysql_query("UPDATE `subscriber` SET `active`= '1' WHERE `u_id` = '$code'");
                echo 'Account confirmed. <a href="vlogin.php">LOGIN</a>';
                }?>
     </div>
<?php include('copyright.php'); ?>
        </div>
    
    <?php
        }else { echo 'Wrong code try again or <a href="vlogin.php">LOGIN</a>';}
}