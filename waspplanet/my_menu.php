<?php include('dbconn.php'); ?>
<?php include('s_chk.php'); ?>
<span class="menu"></span>
<div class="menu-strip">
				<ul>           
					<!--<li><a href="index.php">HOME</a></li> -->
					<li><a href="media.php">MEDIA</a></li>
					<li><a href="v_upload.php">UPLOAD VIDEO</a></li>
					<li><a href="m_upload.php">UPLOAD MUSIC</a></li>
					<li><a href="g_upload.php">UPLOAD GAMES</a></li>
					<!--<li><a href="audio.php">AUDIO</a></li>-->
					<!--<li><a href="#">ARTISTES</a></li> -->
					<!--<li><a href="#">TOP MUSIC</a></li> -->
					<!--<li><a href="about.php">ABOUT</a></li>-->
					<li><a href="contact.php">CONTACTS</a></li>
					<li><a href="analytics.php">ANALYTICS</a></li>
					<li><a href="payment.php">REQUEST PAY</a></li>
                    <?php if($_SESSION['artiste']){ echo '<li><a href="logout.php">LOGOUT</a></li>'; } ?>
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