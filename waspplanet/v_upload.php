<?php include('header_info.php'); ?>
<?php include('s_chk.php'); ?>
<body>
<?php include('track/track.php'); ?>
	<!-- header-section-starts -->


	<div class="container">
		<div class="news-paper">
			<?php include('control.php'); ?>
            <?php include('my_menu.php'); ?>




<?php
ini_set('upload_max_filesize', '300M'); // set max size to 10M (or whatever)
include ('dbconn.php');
if(isset($_POST['submit'])){
    $video_id = $_POST['video_id'];
    //$genre = $_POST['genre'];
    $date = $_POST['date'];
    //$u_id = $_POST['u_id'];
    $name = $_FILES["url"]["name"];
    $size = $_FILES["url"]["size"];
    $maxsize = 1800000000;
    $type = $_FILES["url"]["type"];
    $tmp_name = $_FILES["url"]["tmp_name"];
    $extension = strtolower(substr($name, strpos($name, '.') + 1));
    //$error = $_FILES["file"]["error"];
    if(isset($name)){
        if(!empty($name)){
            if(($extension == 'flv' || $extension == 'mp4' || $extension == '3gp') && ($type == 'video/mp4' || $type == 'video/flv' || $type == 'video/3gp') && $size <= $maxsize){
                $location = 'files/';
               if(move_uploaded_file($tmp_name, $location.$name)){
                   echo 'Uploaded<br/>';
                   echo $extension.' Accepted';
                   mysql_query("INSERT INTO videos(video_id, genre, date, url, u_id)
                                VALUES('$video_id','NULL', '$date','$name', '{$_SESSION['u_id']}')");
               }
            }
            else {
                echo 'File must be flv/mp4 and 2MB or less!';
            }
        }else{
            echo 'Please select a file';
        }
    }
}
?>




<?php
$print_date = date('Y-m-d H:i:s');
?>
<fieldset>
<legend>UPLOAD VIDEO</legend>
<form enctype="multipart/form-data" action="" name="form" method="post">
<label for="video_id">VIDEO NAME</label>
<input type="text" name="video_id" id="video_id" />
<label for="genre">SELECT GENRE/CATEGORY</label>
<?php $sql="SELECT `category` FROM `genre`";
$q=mysql_query($sql);
echo "<div class='form-group'><select class='form-control' name=\'genre\'>";
echo "<option>SELECT A CATEGORY/GENRE</option>";
while($row = mysql_fetch_array($q))
{
echo "<option value='".$row['category']."'>".$row['category']."</option>";
}
echo "</select></div>";
?>
<input type="hidden" name="date" id="date" value="<?php echo $print_date; ?>"/>

<label for="url">SELECT VIDEO</label>
<input type="file" name="url" id="url" />
<input style="color: #fff;
	font-size: 0.875em;
	font-weight: 300;
    float: right;
	border: none;
	display: block;
	padding: 6px 30px;
	outline: none;
	background: #cf0000;
	text-transform:uppercase;
	margin-top:0.5em;" type="submit" name="submit" value="Upload" />
</form>
</fieldset>
<div class="footer text-center">
<?php include('menu_footer.php'); ?>
<?php include('copyright.php'); ?>
</div>
