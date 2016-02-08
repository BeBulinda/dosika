<html>
<?php include('header_info.php'); ?>
<body>
<?php include('track/track.php'); ?>
	<!-- header-section-starts -->
    
	<div class="container">	
		<div class="news-paper">
			<?php include('header.php'); ?>
            <?php include('menu.php'); ?>

			
			<div class="clearfix"></div>
			<div class="main-content">		
				<div class="col-md-9 total-news">
					<?php include('slider.php'); ?>	
				    
                    <?php include('posts.php'); ?>
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