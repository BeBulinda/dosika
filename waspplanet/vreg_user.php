<?php include('header_info.php'); ?>
<?php require('dbconn.php'); ?>
<body>
	<!-- header-section-starts -->
	<div class="container">	
		<div class="news-paper">
            <div class="logo">
						<a href="index.php">
							<h1>DOSIKA<span>RISING STARS</span></h1>
						</a>
					</div>
			<div class="clearfix"></div>
			<div class="main-content">		
				<div class="col-md-9 total-news">
				 	<div class="sign_up text-center">
						<h3>SUBSCRIBER REGISTRATION</h3>
						<p class="sign">Welcome to Dosika!</p>
				        <form enctype="multipart/form-data" action="vr_script.php" name="form" method="post">
                            <input type="hidden" name="u_id"  class="text" value="">
                            <!--<input type="file" name="profile" class="photo" placeholder="">-->
                            <input type="text"  name="username" class="text" placeholder="Choose Username">
							<input type="email" name="email" class="text" placeholder="Email Address">
							<input type="tel" name="cell"   class="number" placeholder="Cell Number">
							<input type="password" name="password" class="text" placeholder="Password">
							<input type="checkbox" name="TC" class="text" value="I agree to the terms and conditions" required/>I agree to the <a href="#">terms and conditions</a>
							<input type="submit" name="submit" value="SIGN UP">
						</form>
                         <p>I have an account. <a href="vlogin.php">LOGIN</a></p>
                       
						<p class="spam"></p>
					</div>
				</div>	 
                    <?php include('sidebar.php'); ?>
				<div class="clearfix"></div>

               
			</div>
			<div class="footer text-center">
                <?php include('copyright.php'); ?>
			</div>
		</div>
	</div>
</body>
</html>