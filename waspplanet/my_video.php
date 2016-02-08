<?php include('header_info.php'); ?>
<?php include('s_chk.php'); ?>
    <fieldset>
            <legend>MY VIDEOS</legend>
<?php 
    include('dbconn.php');
    $display = "SELECT * FROM videos WHERE u_id = '{$_SESSION['u_id']}'";
    $display_proc = mysql_query($display);
    if(mysql_num_rows($display_proc)==0){
         echo 'No videos Uploaded Yet!<br/><br/>';
       
    }else{ 
         while ($row = mysql_fetch_assoc($display_proc)) {
                ?>
            
            <video style="float: left; margin-left: 30px; margin-top: -20px;" width="300" height="250" controls>
                <source src="files/<?php echo $row['url']; ?>" type="video/mp4">
            </video>
            <?php $row["video_id"]; ?>
                
            <?php
                echo "<br>";
        }
        }
    
?>
        </fieldset>
<!--{$_SESSION['u_id']}-->

</html>

