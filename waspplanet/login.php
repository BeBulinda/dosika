<?php include('header_info.php'); ?>

<body>
    
	<!-- header-section-starts -->
	<div class="container">	
		<div class="news-paper">
            <div class="logo">
						<a href="index.php">
							<h1>DOSIKA <span>RISING STARS</span></h1>
						</a>
					</div>
			<div class="clearfix"></div>
			<div class="main-content">		
				<div class="col-md-12 total-news">
				 	<div class="sign_up text-center">
						<h3>ARTIST LOGIN</h3>
						<p class="sign">Welcome to Dosika!</p>
						<form action="login.php" method="post" role="form">
							<input type="text" name="username" class="text" placeholder="Username">
							<input type="password" name="password" class="text" placeholder="Password">
							<input type="submit" name="submit" value="LOGIN">
						</form>
                        
                        <p>I dont have an account. <a href="reg_user.php">SIGNUP</a></p>
<?php
require('dbconn.php');
   if(isset($_POST['username'])&& isset($_POST['password'])){
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        //$username = stripslashes($username);
        /*$username = mysql_real_escape_string($username);
        $password = stripslashes($password);
        $password = mysql_real_escape_string($password);*/
       if(!empty($username)&&!empty($password)){
        $activate=mysql_query("SELECT * FROM `artiste` WHERE `username`='$username' AND `active`='1'");
            $activate_run = mysql_num_rows($activate);
        $query="SELECT * FROM `artiste` WHERE `username`='$username' AND `password`='$password'";
            if($query_run = mysql_query($query)){   // Run SQL query         
                $query_num_rows = mysql_num_rows($query_run); //Check the row data
		              if($query_num_rows == 0){ //The data is non-existent
			                 echo "<p>Invalid username/password combination.!</p>";
		              }else if($query_num_rows == 1){ //Data exists
                          if($activate_run == 1){
				 $username = mysql_result($query_run, 0, 'username');
				 $u_id = mysql_result($query_run, 0, 'u_id');
				 $_SESSION['artiste']=$username;
                 $_SESSION['u_id'] = $u_id;
                $_COOKIE['u_id'] = $u_id;
			Header('Location:media.php');
            echo 'OK.';}else{
                              echo 'Please confirm your account using the code sent to the email you used to signup.<a href = "confirmation.php">HERE!</a>';
                          }
            }
       }
   }
   }
?>
                        
                        
                       
						<p class="spam"></p>
					</div>
				</div>	 
				<div class="clearfix"></div>

			</div>
			<div class="footer text-center">
                <?php include('copyright.php'); ?>
			</div>
		</div>
	</div>
</body>
</html>