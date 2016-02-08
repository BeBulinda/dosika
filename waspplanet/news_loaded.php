 <?php include('header_info.php'); ?>
 <?php include('dbconn.php'); ?>
<body>
    <?php include('track/track.php'); ?>
	<!-- header-section-starts -->
	<div class="container">	
		<div class="news-paper">
			 <?php include('header.php'); ?>
			 <?php include('menu.php'); ?>

			<!-- script for menu -->
			<div class="clearfix"></div>
			<div class="main-content">		
               
            <div class="about-section">
                                <div style="position: relative; margin-left: 20px; margin-right: 20px;" class="about-us">
                                    <div class="col-md-7 about-left">
                                       
                                    <?php
                                    $display = "SELECT * FROM news LIMIT 0,1";
                                    $display_proc = mysql_query($display);
                                    if(mysql_num_rows($display_proc)==0){
                                         echo 'NO NEWS!<br/><br/>';

                                    }else{ 
                                        $row = mysql_fetch_assoc($display_proc);
                                                ?>
                                        <i><?php echo $row['date']; ?></i>
                                         <h3><?php echo $row['title']; ?></h3>
                                        
                                        <div class="abt_image">
                                            <img src="images/abt_pic.jpg" alt="" />
                                        </div>
                                            <p><?php echo $row['info']; ?> </p>
                                            <?php
                                                echo "<br>";
                                        }

                            ?>
                                        
                                    </div>
                                    <div class="col-md-5 about-right">
                                        <h3>WHAT WE OFFER</h3>
                                        <div class="offer">
                                            <h4>1</h4>
                                            <a href="#">LOREM IPSUM DOLOR SIT CONSECTETUER</a>
                                            <div class="clearfix"></div>
                                            <p>Ut enim ad minim veniam, quis nostrud exercitat ion ullamcode laboris nisi dolore massa ealiquipx eato commodo consectetuor massa perspiciatis unde omnis iste natus error sit.</p>
                                        </div>
                                        <div class="offer">
                                            <h4>2</h4>
                                            <a href="#">PRAESENT VESTIBULUM MOLESTIE LACUS</a>
                                            <div class="clearfix"></div>
                                            <p>Ut enim ad minim veniam, quis nostrud exercitat ion ullamcode laboris nisi dolore massa ealiquipx eato commodo consectetuor massa perspiciatis unde omnis iste natus error sit.</p>
                                        </div>
                                        <div class="offer">
                                            <h4>3</h4>
                                            <a href="#">SED UT PERSPICIATIS UNDE OMNIS ISTE</a>
                                            <div class="clearfix"></div>
                                            <p>Ut enim ad minim veniam, quis nostrud exercitat ion ullamcode laboris nisi dolore massa ealiquipx eato commodo consectetuor massa perspiciatis unde omnis iste natus error sit.</p>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="team">
                                    
                                    <h3>MORE WASP NEWS</h3>
                                    <div class="team-grids">
                                        <div class="col-md-2 team-grid">
                                            <?php
                                            $display1 = "SELECT * FROM news LIMIT 6";
                                            $display_proc1 = mysql_query($display1);
                                            if(mysql_num_rows($display_proc1)==0){
                                                 echo 'NO NEWS!<br/><br/>';
                                            }else{ 
                                                $row = mysql_fetch_assoc($display_proc1);
                                                        ?>
                                                    <div class="abt_image">
                                                        <img src="images/t1.jpg" alt="" />
                                                    </div>
                                                     <i><?php echo $row['date']; ?> </i>
                                                     <h5><?php echo $row['title']; ?></h5>
                                                    <?php
                                                        echo "<br>";
                                                }
                                            ?>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>

			</div>
			<div class="footer text-center">
				<?php include('menu_footer.php'); ?>
                <?php include('copyright.php'); ?>
				
			</div>
		</div>
	</div>
</body>
</html>





<?php

?>