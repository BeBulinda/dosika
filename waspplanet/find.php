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
                    <div class="world-news">
							<div class="main-title-head">
								<h3>VIDEO RESULTS</h3> 
								<!--<a href="#">More  +</a>-->
								<div class="clearfix"></div>
							</div>
							<div class="world-news-grids">
								<!--Script starts here-->
                                <?php if(isset($_POST['search_button'])){ ?>
                                        
                                    <fieldset>
                                    <?php 
                                        include('dbconn.php');
                                        $video_search= $_POST['search_input'];
                                    ?>
                                    <p></p>
                                    <p></p>
                                        <?php
                                    $display2 = "SELECT * FROM videos WHERE video_id LIKE '%{$video_search}%' LIMIT 30";
                                    $display2_proc = mysql_query($display2);
                                 if(mysql_num_rows($display2_proc)>=1){
                                    echo '<table style="padding-left:1px;" id="date_view"class=" table table-responsive">';
                                                    echo '<tr>';
                                                    echo '<th id="date_view">VIDEO</th>';
                                                    /*echo '<th id="date_view">BY</th>';*/
                                                    //echo '<th id="date_view">PREVIEW</th>';
                                                    echo '<th id="date_view">SUBSCRIBE</th>';
                                                    echo '<th id="date_view">DOWNLOAD</th>';
                                                    echo '</tr>';
                                        while ($row = mysql_fetch_assoc($display2_proc)) {
                                                echo '<tr>';
                                                ?>
                                            <td><?php echo $row["video_id"]; ?></td>
                                            <!--<td><a class='youtube' href="#">PREVIEW</a></td>-->
                                            <td><a class="youtube" href="input.php?url_i=<?php echo $row["url"];?>">SUBSCRIBE</a></td>
                                            <td><a class="youtube" href="d_process.php?url_i=<?php echo $row["url"];?>">DOWNLOAD</a></td>


                                            <?php
                                                echo "</tr>";
                                        }
                                            echo '</table>';
                                ?>
                                    </fieldset> 
                                    
                                <?php } else echo "NO RESULTS FOR VIDEOS FOUND. WE WILL BE ADDING THAT SOON. SORRY! <br/><br/>";
                            } 
                                
                                ?>
                                <!--Script ends here-->
                                
                            <div class="main-title-head">
								<h3>MUSIC RESULTS</h3>
                                
                                
								<!--<a href="#">More  +</a>-->
								<div class="clearfix"></div>
							</div>
                               <!--Script starts here-->
                                <?php if(isset($_POST['search_button'])){ ?>
                                        
                                    <fieldset>
                                    <?php 
                                        include('dbconn.php');
                                        $video_search= $_POST['search_input'];
                                    ?>
                                        <p></p>

                                        <p></p>
                                        <?php
                   
                                        $display3 = "SELECT artiste.s_name, music.m_id, music.music_id, music.url  
                                                    FROM music
                                                    INNER JOIN artiste 
                                                    ON music.music_id LIKE '%$video_search%'
                                                    AND music.u_id=artiste.u_id LIMIT 20";
                                        $insert_search = mysql_query("INSERT INTO search_store(s_term) VALUES('$video_search')");
                                        $display3_proc = mysql_query($display3);
                                        if(mysql_num_rows($display3_proc)>=1){
                                        echo '<table style="padding-left:1px;" id="date_view" class="table table-responsive">';
                                                        echo '<tr>';
                                                        echo '<th id="date_view">MUSIC</th>';
                                                        echo '<th id="date_view">ARTIST</th>';
                                                        /*echo '<th id="date_view">BY</th>';*/
                                                        //echo '<th id="date_view">PREVIEW</th>';
                                                        echo '<th id="date_view">SUBSCRIBE</th>';
                                                        echo '<th id="date_view">DOWNLOAD</th>';
                                                        echo '</tr>';
                                            while ($row = mysql_fetch_assoc($display3_proc)) {
                                                    echo '<tr>';

                                        ?>
                                        <td><?php echo $row["music_id"]; ?></td>
                                        <!--<td><a class='youtube' href="preview/<?php //echo $row["url"]; ?>">PREVIEW</a></td>-->
                                        <td><?php echo $row["s_name"];?></td>
                                        <td><a class='youtube' href="m_input.php?url_i=<?php echo $row["url"];?>">SUBSCRIBE</a></td>
                                        <td><a class='youtube' href="m_process.php?url_i=<?php echo $row["url"];?>">DOWNLOAD</a></td>

                                                <?php
                                                    echo "</tr>";

                                            }
                                                echo '</table>';
                                    ?>
                                    </fieldset>
                                <?php } else echo "NO RESULTS FOR MUSIC FOUND. WE WILL BE ADDING THAT SOON. SORRY!";
                                }
                                ?>
                                <!--Script ends here-->
								<div class="clearfix"></div>
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