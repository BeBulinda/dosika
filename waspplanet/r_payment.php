<?php include('header_info.php'); ?>
<?php //include('pass.php'); ?>
<?php include('dbconn.php'); ?>
<body>
<?php include('track/track.php'); ?>
	<!-- header-section-starts -->
    

	<div class="container">	
		<div class="news-paper">
			<?php include('wasp_control.php'); ?>
            <?php include('wasp_menu.php'); ?>
           <!-- <h3>SEARCH FOR THE REQUESTED PAYMENTS BY ARTISTS HERE</h3>
			<hr>-->
           
            
            
			<hr>
			<div class="clearfix"></div>
			<div class="main-content">		
				<div class="col-md-9 total-news">
                     <h3>REQUESTED PAYMENTS BY ARTISTS</h3
                        <?php include("r.php"); ?>
                    <div class="clearfix"></div>           
                    <div class="clearfix"></div> 
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