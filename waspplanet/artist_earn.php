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
                    <h3>REQUESTED PAYMENTS BY ARTISTS</h3>
                    
                    <form name="payment" action="artist_earn.php" method="post">
                        <input type="search" name="search" placeholder="Input Artist Username" required/>
                        <input type="submit" name="submit" value="SEARCH"/>
                    </form>
                    
                    <!--Unpaid Query START-->
                        <fieldset id="paid">
                        <?php include('dbconn.php'); ?>  
                            <p></p>
                            <?php
                             
                            
                           if(isset($_POST['search'])&& isset($_POST['submit'])){
                                    $search = $_POST['search'];
                                
                                    $display3 = "SELECT artiste.u_id, artiste.s_name, artiste.o_name  
                                                FROM downloads 
                                                INNER JOIN artiste 
                                                ON downloads.u_id = artiste.u_id 
                                                WHERE artiste.username = '$search' AND downloads.paid='0'";
                                    $display3_proc = mysql_query($display3);//Search Earnings
                               
                                     $display5 = "SELECT artiste.u_id, artiste.s_name, artiste.o_name, COUNT(*) 
                                                    FROM downloads 
                                                    INNER JOIN artiste 
                                                    ON downloads.u_id = artiste.u_id 
                                                    WHERE artiste.username = '$search' AND downloads.paid='1'
                                                    GROUP BY u_id";
                               
                                    $display5_proc = mysql_query($display5);//Earnings                               
                                    $row1 = mysql_fetch_assoc($display5_proc);//Earnings
                               
                                    $row = mysql_fetch_assoc($display3_proc);//Search Earnings
                                                
                                            ?>
                                            <?php echo "Artist ID ".$row["u_id"]."<br/>"; ?>
                                            <?php echo "Artist Name ".$row["s_name"]."<br/>"; ?>
                                            <?php echo "Artist Official Name ".$row["o_name"]."<br/>"; ?>
                                            <?php echo "Total Downloads. ".$row1["COUNT(*)"]."<br/>"; ?>
                                            <?php echo "Total Paid Earnings KES.".$row1["COUNT(*)"]*1.191; ?>
                                            <?php /*if($row[paid] == 1){ echo "YES";} else{ echo "NO";}*/ 
                                }
                            ?>

                            </fieldset>
                    <!--Unpaid Query END-->

                    <!--Earnings table START-->
                            <fieldset id="unpaid">
                            <?php 
                            include('dbconn.php'); ?>  
                            <p></p>
                            <p></p>
                            <?php
                                    $display4 = "SELECT artiste.u_id, artiste.s_name, artiste.o_name, COUNT(*) 
                                                    FROM downloads 
                                                    INNER JOIN artiste 
                                                    ON downloads.u_id = artiste.u_id 
                                                    GROUP BY u_id";
                                    $display4_proc = mysql_query($display4);
                                    echo '<table style="padding-left:1px;" id="date_view"class="table table-responsive">';
                                                    echo '<tr>';
                                                    echo '<th id="date_view">Artist ID</th>';
                                                    echo '<th id="date_view">Artist Name</th>';
                                                    echo '<th id="date_view">Artist Official Names</th>';
                                                    echo '<th id="date_view">NO. TOTAL OF DOWNLOADS</th>';
                                                    echo '<th id="date_view">TOTAL EARNINGS</th>';
                                                    echo '</tr>';
                                        while ($row2 = mysql_fetch_assoc($display4_proc)) {
                                                echo '<tr>';
                                           
                                            ?>
                                            <td><?php echo $row2["u_id"]; ?></td>
                                            <td><?php echo $row2["s_name"];?></td>
                                            <td><?php echo $row2["o_name"];?></td>
                                            <td><?php echo $row2["COUNT(*)"];?></td>
                                            <td><?php echo "KES.".$row2["COUNT(*)"]*1.191;?></td>



                                            <?php
                                                echo "</tr>";

                                        }
                                            echo '</table>';
                                ?>
                        </fieldset>
                    <!--Earnings table END-->
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