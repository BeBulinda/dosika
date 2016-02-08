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
                                        /*
                                            Place code to connect to your DB here.
                                        */
                                        // include your code to connect to DB.

                                        $tbl_name="";		//your table name
                                        // How many adjacent pages should be shown on each side?
                                        $adjacents = 3;

                                        /* 
                                           First get total number of rows in data table. 
                                           If you have a WHERE clause in your query, make sure you mirror it here.
                                        */


                                        $query = "SELECT COUNT(*)  
                                                    as items
                                                    FROM artiste 
                                                     ORDER BY u_id";
                                        $total_pages = mysql_fetch_array(mysql_query($query));
                                        $total_pages = $total_pages['items'];

                                        /* Setup vars for query. */
                                        $targetpage = "artist_signups.php"; 	//your file name  (the name of this file)
                                        $limit = 6; 								//how many items to show per page
                                        
                                        @$page = $_GET['page'];
                                        
                                        if($page) 
                                            $start = ($page - 1) * $limit; 			//first item to display on this page
                                        else
                                            $start = 0;								//if no page var is given, set start to 0
                                        
                                        /* Get data. */
                                        $sql = "SELECT artiste.u_id, artiste.s_name, artiste.o_name, artiste.active, artiste.date_time
                                                    FROM artiste ORDER BY artiste.u_id DESC LIMIT $start, $limit";
                                        $result = mysql_query($sql);

                                        /* Setup page vars for display. */
                                        if ($page == 0) $page = 1;					//if no page var is given, default to 1.
                                        $prev = $page - 1;							//previous page is page - 1
                                        $next = $page + 1;							//next page is page + 1
                                        $lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
                                        $lpm1 = $lastpage - 1;						//last page minus 1

                                        /* 
                                            Now we apply our rules and draw the pagination object. 
                                            We're actually saving the code to a variable in case we want to draw it more than once.
                                        */
                                        $pagination = "";
                                        if($lastpage > 1)
                                        {	
                                            $pagination .= "<div class=\"pagination\">";
                                            //previous button
                                            if ($page > 1) 
                                                $pagination.= "<a href=\"$targetpage?page=$prev\">PREVIOUS</a>";
                                            else
                                                $pagination.= "<span class=\"disabled\">PREVIOUS</span>";	

                                            //pages	
                                            if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
                                            {	
                                                for ($counter = 1; $counter <= $lastpage; $counter++)
                                                {
                                                    if ($counter == $page)
                                                        $pagination.= "<span class=\"current\">$counter</span>";
                                                    else
                                                        $pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
                                                }
                                            }
                                            elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
                                            {
                                                //close to beginning; only hide later pages
                                                if($page < 1 + ($adjacents * 2))		
                                                {
                                                    for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
                                                    {
                                                        if ($counter == $page)
                                                            $pagination.= "<span class=\"current\">$counter</span>";
                                                        else
                                                            $pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
                                                    }
                                                    $pagination.= "...";
                                                    $pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
                                                    $pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
                                                }
                                                //in middle; hide some front and some back
                                                elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
                                                {
                                                    $pagination.= "<a href=\"$targetpage?page=1\">1</a>";
                                                    $pagination.= "<a href=\"$targetpage?page=2\">2</a>";
                                                    $pagination.= "...";
                                                    for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
                                                    {
                                                        if ($counter == $page)
                                                            $pagination.= "<span class=\"current\">$counter</span>";
                                                        else
                                                            $pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
                                                    }
                                                    $pagination.= "...";
                                                    $pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
                                                    $pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
                                                }
                                                //close to end; only hide early pages
                                                else
                                                {
                                                    $pagination.= "<a href=\"$targetpage?page=1\">1</a>";
                                                    $pagination.= "<a href=\"$targetpage?page=2\">2</a>";
                                                    $pagination.= "...";
                                                    for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
                                                    {
                                                        if ($counter == $page)
                                                            $pagination.= "<span class=\"current\">$counter</span>";
                                                        else
                                                            $pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
                                                    }
                                                }
                                            }

                                            //next button
                                            if ($page < $counter - 1) 
                                                $pagination.= "<a href=\"$targetpage?page=$next\">NEXT</a>";
                                            else
                                                $pagination.= "<span class=\"disabled\">NEXT</span>";
                                            $pagination.= "</div>\n";		
                                        }
                                    ?>

                                        <?php
                                             echo '<table style="padding-left:1px;" id="date_view"class="table table-responsive">';
                                                    echo '<tr>';
                                                    echo '<th id="date_view">Artist ID</th>';
                                                    echo '<th id="date_view">Artist Name</th>';
                                                    echo '<th id="date_view">Artist Official Names</th>';
                                                    echo '<th id="date_view">STATUS</th>';
						echo '<th id="date_view">DATE</th>';
                                                    echo '</tr>';
                                            while($row = mysql_fetch_array($result))
                                            {

                                            // Your while loop here
                                                  echo '<tr>';
                                                $get_shuffle[] = $row;
                                                shuffle($get_shuffle);

                                                ?>
                                           <td><?php echo $row["u_id"]; ?></td>
                                            <td><?php echo $row["s_name"];?></td>
                                            <td><?php echo $row["o_name"];?></td>
                                            <td><?php 
                                                if($row["active"]  == 1){
                                                    echo "<span style='color:#15972C;'>VERIFIED</span>";
                                                }else{
                                                    echo "<span style='color:#FA3D12;'>UNVERIFIED</span>";
                                                }?></td>
					<td><?php echo $row["date_time"];?></td>
                                    <?php
                                                    echo "</tr>";

                                            }
                                                echo '</table>';
                                    ?>
                                    <?=$pagination?>
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

 
	
                                