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
    $p_name = $_POST['p_name'];
    $subject = $_POST['subject'];
    $class = $_POST['class'];
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
            if(($extension == 'pdf' || $extension == 'zip') && $size <= $maxsize){
            $location = 'papers/';
               if(move_uploaded_file($tmp_name, $location.$name)){
                   echo "<script> alert('Document Uploaded')</script>";
                   mysql_query("INSERT INTO papers(p_name,  url, dates, subjects, classes,  u_id) 
                                VALUES('$p_name',  '$name', '$date', '$subject', '$class',  '{$_SESSION['u_id']}')");
               }
            }else {
                echo "<script>alert('File must be pdf/zip and 40MB or less!')</script>";
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
    <legend>UPLOAD PAPER</legend>
<form enctype="multipart/form-data" action="" name="form" method="post">
<label for="music_id">PAPER NAME</label>
<input type="text" name="p_name" id="p_name" />
<label for="subject">SELECT SUBJECT</label>
<div class='form-group'>
    <select class='form-control' name='subject'>
        <option>SELECT SUBJECT</option>
        <option value='ENGLISH'>ENGLISH</option>
        <option value='KISWAHILI'>KISWAHILI</option>
        <option value='MATHEMATICS'>MATHEMATICS</option>
        <option value='SCIENCE'>SCIENCE</option>
        <option value='GEOGRAPHY'>GEOGRAPHY</option>
         <option value='GHC'>GHC</option>
    </select>
    </div>
<label for="class">SELECT CLASS/FORM</label>
<div class='form-group'>
    <select class='form-control' name='class'>
        <option>SELECT CLASS/FORM</option>
        <option value='CLASS 1'>CLASS 1</option>
        <option value='CLASS 2'>CLASS 2</option>
        <option value='CLASS 3'>CLASS 3</option>
        <option value='CLASS 4'>CLASS 4</option>
        <option value='CLASS 5'>CLASS 5</option>
        <option value='CLASS 6'>CLASS 6</option>
        <option value='CLASS 7'>CLASS 7</option>
        <option value='CLASS 8'>CLASS 8</option>
        <option value='FORM 1'>FORM 1</option>
        <option value='FORM 2'>FORM 2</option>
        <option value='FORM 3'>FORM 3</option>
        <option value='FORM 4'>FORM 4</option>
    </select>
</div>

<input type="hidden" name="date" id="date" value="<?php echo $print_date; ?>"/>
        
<label for="url">SELECT FILE</label>
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