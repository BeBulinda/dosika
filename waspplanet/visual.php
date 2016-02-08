<?php include('header_info.php'); ?>
<body>
	<!-- header-section-starts -->
    
	<div class="container">	
		<div class="news-paper">
			<?php include('header.php'); ?>
            <?php include('menu.php'); ?>

			
			<div class="clearfix"></div>
			<div class="main-content">		
				<div class="col-md-9 total-news">
				<div class="posts">
					<!--<div class="left-posts">-->
						<div class="world-news">
							<div class="main-title-head">
								<h3>GREAT VIDEOS</h3>
								<!--<a href="#">More  +</a>-->
								<div class="clearfix"></div>
							</div>
							<div class="world-news-grids">
				
                                <?php include('videos.php'); ?>
                                
								<div class="clearfix"></div>
							</div>
						</div>
                    </div>
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