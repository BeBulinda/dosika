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
			                 echo "<p>No videos uploaded of late.</p><br/>";
		              }else{ //Data exists
                       
                        
                      }
				     
                    ?>   
                    <br/>
                        
                     <?php
                     $query_run1=mysql_query("SELECT * FROM `downloads` WHERE u_id='{$_SESSION['u_id']}' AND paid=0");
                     $query_num_rows1 = mysql_num_rows($query_run1); //Check the row data
		              if($query_num_rows1 == 0){ //The data is non-existent
			                 echo "<p>No downloads so far.</p>";
		              }else{ //Data exists
                        echo "<table>";
                        echo "<tr><td>You have uploaded <a href='media.php'>     </td><td>......." .$query_num_rows. "</a> video(s).</td></tr>";
                        echo "<tr><td>There are <a href='media.php'>     </td><td>........".$query_num_rows1. "</a> downloads.</td></tr>";
                        echo "<tr><td>Your total earnings      </td><td>.......".$query_num_rows1 * 1.191 . "</td></tr>";
                        echo "<tr><td><a href='payment.php'>Request Payment</a></td></tr>";
                        echo "</table>";
                        ?>
                       
                        <br/>
				     <?php
                       }
                   ?>
                    
                    <!--Pie Chart -->
                        <?php 
                        $total = 15; 
                        $down = ($query_num_rows1/$total)*100;
                        $up = ($query_num_rows/$total)*100;
                        ?>
                        <div style="float:left;">
                        <script type="text/javascript">
                        window.onload = function () {
                            var down = "<?php echo $down; ?>";
                            var up = "<?php echo $up; ?>";
                            var chart = new CanvasJS.Chart("chartContainer",
                            {
                                title:{
                                    text: "GRAPHICAL DATA",
                                    verticalAlign: 'top',
                                    horizontalAlign: 'left'
                                },
                                        animationEnabled: true,
                                data: [
                                {        
                                    type: "doughnut",
                                    startAngle:20,
                                    toolTipContent: "{label}: <strong>{y}%</strong>",
                                    //indexLabel: "{label} #percent%",
                                    dataPoints: [
                                        {  y: down, label: "Music" },
                                        {  y: up, label: "Videos" },
                                        {  y: 10, label: "Downloads" }
                                    ]
                                }
                                ]
                            });
                            chart.render();
                        }
                    </script>
                    <script type="text/javascript" src="scripts/canvasjs.min.js"></script>
                    <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                    </div>
                    <!--Pie Chart -->
                        
                        
                        
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