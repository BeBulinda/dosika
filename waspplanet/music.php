<fieldset>
<?php include('track/track.php'); ?>
<?php 
    include('dbconn.php');
    /*$display = "SELECT * FROM music LIMIT 6";
    $display_proc = mysql_query($display);
    
        while ($row = mysql_fetch_assoc($display_proc)) {
                ?>
                <p style="position: relative; color: #CF0000;"><?php echo $row['music_id']; ?></p>
                <audio controls>
                <source src="files/<?php echo $row['url']; ?>" type="audio/mpeg">
            </audio>
                
            <?php
                echo "<br>";
        }*/
         
?>
    
    
    <p></p>
    <p></p>
    <?php
    $display3 = "SELECT artiste.s_name, music.m_id, music.music_id, music.url  
                FROM music 
                INNER JOIN artiste 
                ON music.u_id=artiste.u_id 
                GROUP BY artiste.u_id
                DESC LIMIT 10";
    $display3_proc = mysql_query($display3);
    echo '<table style="padding-left:1px;" id="date_view"class="table table-responsive">';
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
            $get_shuffle[] = $row;
            shuffle($get_shuffle);
               
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
    <a style="float:right;" href="audio.php">More Music>>>>>></a>
</fieldset>
        
<!--{$_SESSION['u_id']}-->
