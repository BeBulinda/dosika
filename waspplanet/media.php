<?php include('header_info.php'); ?>
<?php include('dbconn.php'); ?>
<?php include('s_chk.php'); ?>
<body>
    <?php include('track/track.php'); ?>
	<!-- header-section-starts -->
    

	<div class="container">	
		<div class="news-paper">
			<?php include('control.php'); ?>
            <?php include('my_menu.php'); ?>

			
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
                    <?php include('my_video.php'); ?>
                    <?php include('my_music.php'); ?>
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