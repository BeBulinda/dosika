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
include ('dbconn.php');
if(isset($_POST['submit'])){
    $music_id = $_POST['music_id'];
    //$genre = $_POST['genre'];
    $date = $_POST['date'];
    $name = $_FILES["url"]["name"];
    $size = $_FILES["url"]["size"];
    $maxsize = 6204000000;
    $type = $_FILES["url"]["type"];
    $tmp_name = $_FILES["url"]["tmp_name"];
    $extension = strtolower(substr($name, strpos($name, '.') + 1));
    //$error = $_FILES["file"]["error"];
    if(isset($name)){
        if(!empty($name)){
            if(($extension == 'mp3' || $extension == 'wma') && $size <= $maxsize){
            $location = 'files/';
               if(move_uploaded_file($tmp_name, $location.$name)){
                   echo "<script> alert('Music Uploaded')</script>";
                   mysql_query("INSERT INTO music(music_id, genre, date, url, u_id) 
                                VALUES('$music_id','NULL', '$date','$name', '{$_SESSION['u_id']}')");
               }
            }else {
                echo "<script>alert('File must be mp3/wma and 4MB or less!')</script>";
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
    <legend>UPLOAD MUSIC</legend>
<form enctype="multipart/form-data" action="" name="form" method="post">
<label for="music_id">TRACK NAME</label>
<input type="text" name="music_id" id="music_id" />
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
        
<label for="url">SELECT AUDIO FILE</label>
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