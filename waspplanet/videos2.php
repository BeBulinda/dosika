<?php 
//error_reporting(0);
//error_reporting(E_ALL | E_STRICT);
//ini_set('display_errors', true);
//require_once('conn/conn_x.php');
//include 'conn/functions.php';
//require_once 'resources/Mobile_Detect.php';
//include 'resources/mob_detect.php';
?>
<html>

<fieldset>
<?php 
    include('dbconn.php');
    $display = "SELECT * FROM videos LIMIT 1";
    $display_proc = mysql_query($display);
    
        while ($row = mysql_fetch_assoc($display_proc)) {
                ?>
                <h5 style="float: right;"><?php echo $row["video_id"]; ?></h5>
                <video style="float: left; margin-left: 5px; width: 100% !important; height: auto !important;" onclick="this.play();" controls>
                <source src="files/<?php echo $row["url"]; ?>" type="video/mp4">
            </video>                
            <?php
          }
?>
    <p></p>
    <p></p>
<?php
    $display2 = "SELECT * FROM videos LIMIT 0, 10";
    $display2_proc = mysql_query($display2);
    echo '<table style="padding-left:1px;" id="date_view"class="table table-responsive">';
					echo '<tr>';
					echo '<th id="date_view">VIDEO</th>';
					/*echo '<th id="date_view">BY</th>';*/
					echo '<th id="date_view">VIEW</th>';
					echo '<th id="date_view">DOWNLOAD</th>';
					echo '</tr>';
        while ($row = mysql_fetch_assoc($display2_proc)) {
                echo '<tr>';
?>
    <td><?php echo $row["video_id"]; ?></td>
    <td><a class='youtube' href="preview/<?php //echo $row["url"]; ?>">VIEW</a>
    <?php
    $url_show = $row["url"];
    ?>
    </td>
    
    
  <!-- <a class='youtube' href="#subscr">DOWNLOAD</a>-->
    <td><input type="button" value="DOWNLOAD" onclick="window.open('input.php', '_top')" /></td>
            <?php
                echo "</tr>";
        }
            echo '</table>';
?>
    </fieldset> 
<!--{$_SESSION['u_id']}-->
    <div style='display:none'>
        <div id="video_watch">
			<h5 style="float: right;"> <?php echo $row["video_id"]; ?> </h5>
                <video style="float: left; margin-left: 5px; width: 100% !important; height: auto !important;" onclick="this.play();" controls>
                <source src="files/<?php echo $row["url"]; ?>" type="video/mp4">
            </video>
        </div>
        <div id="subscr">
			<h5 style="float: right;">SUBSCRIBE HERE</h5>
                
        </div>
    </div>
    
</html>