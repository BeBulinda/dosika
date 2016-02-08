<html>

<script src="js/jquery.colorbox.js"></script>
<script src="js/vdo_pop.js"></script>
<fieldset>
<?php 
    include('dbconn.php');
    $display = "SELECT * FROM videos LIMIT 1";
    $display_proc = mysql_query($display);
    
        while ($row1 = mysql_fetch_assoc($display_proc)) {
                ?>
                <h5 style="float: right;"><?php echo $row1["video_id"]; ?></h5>
                <video style="float: left; margin-left: 5px; width: 100% !important; height: auto !important;" onclick="this.play();" controls>
                <source src="files/<?php echo $row1["url"]; ?>" type="video/mp4">
            </video>                
            <?php
          }
?>
    <p></p>
    
     
            <?php
//FILE SIZE
            $file_url =  $_SERVER["DOCUMENT_ROOT"] . "../files/Evangelist%20Richard%20Wachanga%20Kamau-Ninjui%20ningona%20Ngai.mp4";
            function file_size($file_url){
            $size = filesize($file_url);
            if($size >= 1073741824){
                $fileSize = round($size/1024/1024/1024,1) . 'GB';
            }elseif($size >= 1048576){
                $fileSize = round($size/1024/1024,1) . 'MB';
            }elseif($size >= 1024){
                $fileSize = round($size/1024,1) . 'KB';
            }else{
                $fileSize = $size . ' bytes';
            }
            return $fileSize;
} 
            
            ?> 
    <p></p>
    <?php
    $display2 = "SELECT * FROM videos ORDER BY v_id DESC LIMIT 10";
    $display2_proc = mysql_query($display2);
    echo '<table style="padding-left:1px;" id="date_view"class=" table table-responsive">';
					echo '<tr>';
					echo '<th id="date_view">VIDEO</th>';
					/*echo '<th id="date_view">BY</th>';*/
					//echo '<th id="date_view">FILE SIZE</th>';
					echo '<th id="date_view">SUBSCRIBE</th>';
					echo '<th id="date_view">DOWNLOAD</th>';
					echo '</tr>';
        while ($row = mysql_fetch_assoc($display2_proc)) {
                echo '<tr>';
                ?>
            <td><?php echo $row["video_id"]; ?></td>
           
        
            
            <?php $file_url = $row["url"]; ?>
              
           <!--<td><?php //echo file_size('$file_url'); ?></td>-->
            <td><a class="youtube" href="input.php?url_i=<?php echo $file_url;?>">SUBSCRIBE</a></td>
            <td><a class="youtube" href="d_process.php?url_i=<?php echo $file_url;?>">DOWNLOAD</a></td>
    
    
            <?php
                echo "</tr>";
        }
            echo '</table>';
?>
    <a style="float:right;" href="visual.php">More Videos >>>></a>
    </fieldset> 
<!--{$_SESSION['u_id']}-->
   <!-- <div style='display:none'>
        <div id="video_watch">
			<h5 style="float: right;"> <?php //echo $row["video_id"]; ?> </h5>
                <video style="float: left; margin-left: 5px; width: 100% !important; height: auto !important;" onclick="this.play();" controls>
                <source src="files/<?php //echo $row["url"]; ?>" type="video/mp4">
            </video>
        </div>
        <div id="download">
			<h5 style="float: right;">ENTER YOUR MOBILE NO.</h5>
                <iframe src="input.php" width="300" height="200" ></iframe>
        </div>
    </div>-->
    
</html>
