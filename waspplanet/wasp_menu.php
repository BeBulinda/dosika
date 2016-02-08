<?php include('dbconn.php'); ?>
<?php //include('s_chk.php'); ?>
<span class="menu"></span>
<div class="menu-strip">
				<ul>           
					<li><a href="index.php">HOME</a></li>/
					<!--<li><a href="media.php">MY MEDIA</a></l-->
					<li><a href="r_payment.php">REQUESTED PAYMENTS</a></li>/
					<li><a href="artist_earn.php">ARTIST EARNINGS</a></li>/
					<li><a href="artist_signups.php">ARTIST SIGNUPS</a></li>/
					<li><a href="admin_logout.php">LOGOUT</a></li>
					<!--<li><a href="audio.php">AUDIO</a></li>-->
					<!--<li><a href="#">ARTISTES</a></li> -->
					<!--<li><a href="#">TOP MUSIC</a></li> -->
					<!--<li><a href="about.php">ABOUT US</a></li>
					<li><a href="contact.php">CONTACT US</a></li>
					<li><a href="analytics.php">ANALYTICS</a></li>
					<li><a href="payment.php">REQUEST PAYMENT</a></li>-->
                    <?php //if($_SESSION['artiste']){ //echo '<li><a href="logout.php">LOGOUT</a></li>'; } ?>
				</ul>
</div>
<!-- script for menu -->
				<script>
				$( "span.menu" ).click(function() {
				  $( ".menu-strip" ).slideToggle( "slow", function() {
				    // Animation complete.
				  });
				});
			</script>
<!-- script for menu -->