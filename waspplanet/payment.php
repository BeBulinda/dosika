<?php include('header_info.php'); ?>
<?php include('dbconn.php'); ?>
<body>
<?php include('track/track.php'); ?>
	<!-- header-section-starts -->
    

	<div class="container">	
		<div class="news-paper">
			<?php include('control.php'); ?>
            <?php include('my_menu.php'); ?>
            <h3>YOUR CONTENT USAGE AND ACCESS INFORMATION</h3>
			<hr>
			<div class="clearfix"></div>
			<div class="main-content">		
				<div class="col-md-9 total-news">
                    <div>
                    <?php //include('v_upload.php'); ?>  
                    <?php //include('m_upload.php'); ?>
                    </div>
                    <br/>
                    <br/>
                    <div class="clearfix"></div> 
                    
                    <div style="position: relative; margin-left: 50px; margin-top: -50px;">
                    
                    <?php
      
        $query_run=mysql_query("SELECT * FROM `videos`");
                $query_num_rows = mysql_num_rows($query_run); //Check the row data
		              if($query_num_rows == 0){ //The data is non-existent
			                 echo "<p>No videos uploaded so far</p>";
		              }else{ //Data exists
                       
                        
                      }
				 /*$username = mysql_result($query_run, 0, 'username');
				 $u_id = mysql_result($query_run, 0, 'u_id');
				 $_SESSION['username']=$username;
			Header('Location:media.php');
            echo 'OK.';*/     
                    ?>   
                    <br/>
                        
                     <?php
                     $query_run1=mysql_query("SELECT * FROM `downloads` WHERE u_id='{$_SESSION['u_id']}' AND paid=0");
                     $query_num_rows1 = mysql_num_rows($query_run1); //Check the row data
		              if($query_num_rows1 == 0){ //The data is non-existent
			                 echo "<p>No downloads of late.</p><br/>";
		              }else{ //Data exists
                        echo "<table>";
                        echo "<tr><td>You have uploaded <a href='media.php'>     </td><td>......." .$query_num_rows. "</a> video(s).</td></tr>";
                        echo "<tr><td>There are <a href='media.php'>     </td><td>........".$query_num_rows1. "</a> downloads.</td></tr>";
                        echo "<tr><td>Your total earnings      </td><td>.......".$query_num_rows1 * 1.191 . "</td></tr>";
                        echo "</table>";
                        ?>  
                        <div class="sign_up">
                        <h3>Request Payment</h3>
                        <form action="payment.php" method="post" role="form" name="form">
							<input type="text" name="username" class="text" placeholder="Username" required/>
							<input type="password" name="password" placeholder="Password"/>
							<input type="submit" name="send_request" value="SUBMIT REQUEST"/>
						</form>
                        </div>
                            <?php
                          if(isset($_POST['send_request'])){
                               if(isset($_POST['username'])&& isset($_POST['password'])){
                                $username = $_POST['username'];
                                $password = md5($_POST['password']);
                                //$username = stripslashes($username);
                                //$username = mysql_real_escape_string($username);
                              
                                $activate=mysql_query("SELECT * FROM `artiste` WHERE `username`='$username' AND `active`='1'");
                                $activate_run = mysql_num_rows($activate);
                                $query="SELECT * FROM `artiste` WHERE `username`='$username' AND `password`='$password'";
                                    if($query_run = mysql_query($query)){   // Run SQL query         
                                        $query_num_rows = mysql_num_rows($query_run); //Check the row data
                                              if($query_num_rows == 0){ //The data is non-existent
                                                     echo "<p>Invalid username/password combination.!</p>";
                                              }//The data is non-existent
                                        else if($query_num_rows == 1){ //Data exists

                                         $username = mysql_result($query_run, 0, 'username');
                                         $u_id = mysql_result($query_run, 0, 'u_id');
                                         $s_name = mysql_result($query_run, 0, 's_name');
                                         $o_name = mysql_result($query_run, 0, 'o_name');
                                         $email = mysql_result($query_run, 0, 'email');
                                         $cell = mysql_result($query_run, 0, 'cell');
                                         $_SESSION['artiste']=$username;
                                         $_SESSION['u_id'] = $u_id;
                                         $_COOKIE['u_id'] = $u_id;
                                        $to = "dosikarising@gmail.com, $email";
                                         $subject = 'PAYMENT REQUEST CONFIRMATION';
                                        $body = "Payment requested by\n\n UserID: " . $u_id. "\n\nArtist Name: ".$s_name. "\n\nOfficial Names: ".$o_name. "\n\nEmail Address: " .$email. "\n\nAmount to Pay: " .$query_num_rows1 * 1.191. "\n\nTelephone No:  0". $cell;
                                         $headers = 'From: WASP AFRICA <wasp@waspafrica.com>';

                                        if(mail($to, $subject, $body, $headers)){
                                           echo'Email has been sent to  '. $email;
                                            $update = mysql_query("UPDATE downloads SET paid=1 WHERE u_id='{$_SESSION['u_id']}'");
                                            $amount = $query_num_rows1 * 1.191;
                                            $date = date("d-m-y");
                                            $register_payment = mysql_query("INSERT INTO payments(date, username, downloads, amount) 
                                                                            VALUES ('$date', '$username', '$query_num_rows1', '$amount')");
                                        } else {
                                           echo 'There was an error sending the email.';
                                        }
            }//Data exists
       }// Run SQL query 
   
   }//If end password and username set
}//If end send_request
                            ?>
                        <!--</div>-->
                        <br/>
				     
                   
                        
                       
                       
                      <?php
                       }
                   ?>
                    
                   
                        
                        
                        
                    </div>
                    
                    <div class="clearfix"></div> 
                    <br/>
                   
					
				</div>	 
				     
                    <?php include('sidebar.php'); ?>
				<div class="clearfix"></div>
			</div>
			<div class="footer text-center">
				<?php include('menu_footer.php'); ?>
                <?php include('copyright.php'); ?>
				
			</div>
		</div>
	</div>
</body>
</html>