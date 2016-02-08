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
                            $display3 = "SELECT id, date, username, downloads, amount, paid FROM payments LIMIT 20";
                            $display3_proc = mysql_query($display3);
                            echo '<table style="padding-left:1px;" id="date_view"class="table table-responsive">';
                                            echo '<tr>';
                                            echo '<th id="date_view">NO.</th>';
                                            echo '<th id="date_view">DATE</th>';
                                            echo '<th id="date_view">USERNAME</th>';
                                            echo '<th id="date_view">NO. OF DOWNLOADS</th>';
                                            echo '<th id="date_view">AMOUNT</th>';
                                            echo '<th id="date_view">PAID</th>';
                                            echo '</tr>';
                                while ($row = mysql_fetch_assoc($display3_proc)) {
                                        echo '<tr>';
                                    $get_shuffle[] = $row;
                                    shuffle($get_shuffle);

                            ?>
                            <td><?php echo $row["id"]; ?></td>
                            <td><?php echo $row["date"];?></td>
                            <td><?php echo $row["username"];?></td>
                            <td><?php echo $row["downloads"];?></td>
                            <td><?php echo "KES.".$row["amount"];?></td>
                            <td><?php echo $row["paid"];?></td>
                            

                                    <?php
                                        echo "</tr>";

                                }
                                    echo '</table>';
                        ?>
</fieldset>
<!--{$_SESSION['u_id']}-->