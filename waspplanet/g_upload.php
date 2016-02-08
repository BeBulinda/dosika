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
    $g_name = $_POST['g_name'];
    $platform = $_POST['platform'];
    $phone = $_POST['phone'];
    $model_id = $_POST['model_id'];
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
            if(($extension == 'jar' || $extension == 'zip') && $size <= $maxsize){
            $location = 'games/';
               if(move_uploaded_file($tmp_name, $location.$name)){
                   echo "<script> alert('Game File Uploaded')</script>";
                   mysql_query("INSERT INTO games(g_name,  url, date, platform, phone, model_id,  u_id) 
                                VALUES('$g_name',  '$name', '$date', '$platform', '$phone', '$model_id',  '{$_SESSION['u_id']}')");
               }
            }else {
                echo "<script>alert('File must be jar/zip and 40MB or less!')</script>";
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
    <legend>UPLOAD GAME</legend>
<form enctype="multipart/form-data" action="" name="form" method="post">
<label for="music_id">GAME NAME</label>
<input type="text" name="g_name" id="g_name" />
<label for="platform">SELECT PLATFORM SUPPORT</label>
<div class='form-group'>
    <select class='form-control' name='platform'>
        <option>SELECT A PLATFORM</option>
        <option value='JAVA'>JAVA</option>
        <option value='ANDROID'>ANDROID</option>
        <option value='WINDOWS'>WINDOWS</option>
        <option value='BLACKBERRY'>BLACKBERRY</option>
        <option value='SYMBIAN'>SYMBIAN</option>
    </select>
    </div>
<label for="phone">SELECT PHONE MODEL SUPPORTED</label>
<div class='form-group'>
    <select class='form-control' name='phone'>
        <option>SELECT PHONE MODEL SUPPORTED</option>
        <option value='SAMSUNG'>SAMSUNG</option>
        <option value='LG'>LG</option>
        <option value='ALCATEL'>ALCATEL</option>
        <option value='BLACKBERRY'>BLACKBERRY</option>
        <option value='SONY ERICSON'>SONY ERICSON</option>
        <option value='MOTOROLA'>MOTOROLA</option>
        <option value='NOKIA'>NOKIA</option>
        <option value='HUAWEI'>HUAWEI</option>
        <option value='HTC'>HTC</option>
        <option value='ZTE'>ZTE</option>
        <option value='XEN'>XEN</option>
        <option value='PHI'>PHI</option>
    </select>
</div>
<label for="model_id">MODEL NAME</label>
<input type="text" name="model_id" id="model_id" required/>
<input type="hidden" name="date" id="date" value="<?php echo $print_date; ?>"/>
        
<label for="url">SELECT GAME FILE</label>
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