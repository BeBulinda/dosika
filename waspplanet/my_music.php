<?php include('header_info.php'); ?>
<?php include('s_chk.php'); ?>
    <fieldset>
            <legend>MY MUSIC</legend>
<?php 
    include('dbconn.php');
    $display = "SELECT * FROM music WHERE u_id = '{$_SESSION['u_id']}'";
    $display_proc = mysql_query($display);
     if(mysql_num_rows($display_proc)==0){
         echo 'No music Uploaded Yet!<br/><br/>';
     }else{
        while ($row = mysql_fetch_assoc($display_proc)) {
                ?>
            <p style="position: relative; margin-left: 26px; color: #CF0000;"><?php echo $row['music_id']; ?></p>
            <br/>
            <audio style="float: left; margin-left: 30px; margin-top: -20px;" width="600" height="250" controls>
                <source src="files/<?php  echo $row['url']; ?>" type="audio/mp3">
            </audio>
            <?php $row["music_id"]; ?>
                
            <?php
                echo "<br>";
        }
     }
    
    
?>
        </fieldset>
<!--{$_SESSION['u_id']}-->

</html>
