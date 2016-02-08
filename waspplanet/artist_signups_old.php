<?php include('header_info.php'); ?>
<?php include('dbconn.php'); ?>
<body>
<?php include('track/track.php'); ?>
	<!-- header-section-starts -->
    

	<div class="container">	
		<div class="news-paper">
			<?php include('wasp_control.php'); ?>
            <?php include('wasp_menu.php'); ?>
            <!-- 
            <h3>SEARCH FOR THE REQUESTED PAYMENTS BY ARTISTS HERE</h3>
			<hr>
            -->
			<hr>
			<div class="clearfix"></div>
			<div class="main-content">		
				<div class="col-md-9 total-news">
                    <h3>ARTIST SIGNUP STATUS</h3>
                    

                    <!--SignUps table START-->
                            <fieldset id="signup">
                            <?php 
                            include('dbconn.php'); ?>  
                            <p></p>
                            <p></p>
                            <?php
                                    $display4 = "SELECT artiste.u_id, artiste.s_name, artiste.o_name, artiste.active, artiste.date_time
                                                    FROM artiste";
                                    $display4_proc = mysql_query($display4);
                                    echo '<table style="padding-left:1px;" id="date_view"class="table table-responsive">';
                                                    echo '<tr>';
                                                    echo '<th id="date_view">Artist ID</th>';
                                                    echo '<th id="date_view">Artist Name</th>';
                                                    echo '<th id="date_view">Artist Official Names</th>';
                                                    echo '<th id="date_view">STATUS</th>';
							echo '<th id="date_view">DATE</th>';
                                                    echo '</tr>';
                                        while ($row2 = mysql_fetch_assoc($display4_proc)) {
                                                echo '<tr>';
                                           
                                            ?>
                                            <td><?php echo $row2["u_id"]; ?></td>
                                            <td><?php echo $row2["s_name"];?></td>
                                            <td><?php echo $row2["o_name"];?></td>
                                            <td><?php 
                                                if($row2["active"]  == 1){
                                                    echo "<span style='color:#15972C;'>VERIFIED</span>";
                                                }else{
                                                    echo "<span style='color:#FA3D12;'>UNVERIFIED</span>";
                                                }
                                            
                                            ?></td>
						<td><?php echo $row2["date_time"];?></td>



                                            <?php
                                                echo "</tr>";

                                        }
                                            echo '</table>';
                                ?>
                        </fieldset>
                    <!--SignUps table END-->
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