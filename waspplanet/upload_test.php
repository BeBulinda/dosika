<?php include('dbconn.php'); ?>
<form action="upload_test.php" method="post" enctype="multipart/form-data">
<input type="file" name="file"/>
<input type="submit" value="Upload"/>
</form>



<?php
$name = $_FILES["file"]["name"];
$size = $_FILES["file"]["size"];
$maxsize = 2097152;
$type = $_FILES["file"]["type"];
$tmp_name = $_FILES["file"]["tmp_name"];
$extension = strtolower(substr($name, strpos($name, '.') + 1));
//$error = $_FILES["file"]["error"];
if(isset($name)){
    if(!empty($name)){
        if(($extension == 'jpg' || $extension == 'jpeg') && ($type == 'image/jpeg' || $type == 'image/jpg') && $size<=$maxsize){
            $location = 'files/';
           if(move_uploaded_file($tmp_name, $location.$name)){
               echo 'Uploaded<br/>';
               echo $extension.' Accepted';
               mysql_query("INSERT INTO videos(url) VALUES('$name')");
           }
        }else {
            echo 'File must be jpg/jpeg and 2MB or less!';
        }
    }else{
        echo 'Please select a file';
    }
}
?>
