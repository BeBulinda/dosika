<?php 
session_start();
include('dbconn.php');
include('header_info.php');
include('conn/conn_x.php');
error_reporting( error_reporting() & ~E_WARNING);
error_reporting( error_reporting() & ~E_NOTICE );
$_SESSION['url'] = print_r($_REQUEST['url_i'], true);
?>
<?php include('track/track.php'); ?>
<div class="container">
    <div class="news-paper">
        <div class="sign_up text-center">
            <form id="frm_subcription" action="m_process.php" method="post">
            <label for="token">TOKEN NO.</label>
                <input type="number" name="token" id="token" placeholder="Input your token number here" required/><br/>
                <input type="hidden" name="sessionx" id="sessionx" value = "<?php echo $_SESSION['url']; ?>" placeholder="<?php echo $_SESSION['url']; ?>" />       
                    <?php
                    /*$_SESSION['url'] = $url;*/
                    echo $_SESSION['url'];
                    //echo $_SESSION['url'] = print_r($_REQUEST['url_i'], true);
                    //$url_check = mysql_query("SELECT * FROM downloads WHERE url='$url'") or die(mysql_error());//Downloads table
                    //$download_insert = mysql_query("INSERT INTO downloads(token, v_id, url, used, number) VALUES('$token', '$vi_d', $)");
                    if(isset($_POST['submit'])){
                        $sessionx = $_POST['sessionx'];
                        $token = $_POST['token'];
                        
                         
                        
                        $token_check_s = mssql_query("SELECT * from wasp_planet.dbo.f_token where token ='$token'", $dbhandle);
                        $token_s = mssql_fetch_array($token_check_s);
                        $row_d = mysql_fetch_assoc($url_check);
                                 if($token_s){
                                     if($token_s['used']==0){
                                           /* Download Documenting */
                                            $display_u = "SELECT * FROM music WHERE url = '$sessionx'";
                                            $display_u_proc = mysql_query($display_u);
                                            $row_u = mysql_fetch_assoc($display_u_proc);
                                            $v_id = $row_u["m_id"];
                                            $u_id = $row_u["u_id"];
                                            $used = 1;
                                            $insert=mysql_query("INSERT INTO downloads(token, v_id, url, used, number, u_id) 
                                                                VALUES ('$token', '$v_id' , '$sessionx', '$used', 'NULL', '$u_id')") or die(mysql_error()); 
    
                                            /* Download Documenting */
                                         
                                               //Update used to 1
                                         $used_update = mssql_query("UPDATE wasp_planet.dbo.f_token SET used = '1' 
                                                                        WHERE token = '$token'", $dbhandle);
                                         //Download Content
                                            //if($row_d){
                                                function output_file($file, $name, $mime_type='')
                                                {
                                                 /*This function takes a path to a file to output ($file),  the filename that the browser will see ($name) and  the MIME type of the file ($mime_type, optional)*/
                                                 //Check the file premission
                                                 if(!is_readable($file)) die('File not found or inaccessible!');
                                                 $size = filesize($file);
                                                 $name = rawurldecode($name);
                                                 /* Figure out the MIME type | Check in array */
                                                 $known_mime_types=array(
                                                    "pdf" => "application/pdf",
                                                    "txt" => "text/plain",
                                                    "html" => "text/html",
                                                    "htm" => "text/html",
                                                    "exe" => "application/octet-stream",
                                                    "zip" => "application/zip",
                                                    "doc" => "application/msword",
                                                    "xls" => "application/vnd.ms-excel",
                                                    "ppt" => "application/vnd.ms-powerpoint",
                                                    "gif" => "image/gif",
                                                    "png" => "image/png",
                                                    "jpeg"=> "image/jpg",
                                                    "jpg" => "image/jpg",
                                                    "php" => "text/plain"
                                                 );

                                                 if($mime_type==''){
                                                     $file_extension = strtolower(substr(strrchr($file,"."),1));
                                                     if(array_key_exists($file_extension, $known_mime_types)){
                                                        $mime_type=$known_mime_types[$file_extension];
                                                     } else {
                                                        $mime_type="application/force-download";
                                                     };
                                                 };
                                                 //turn off output buffering to decrease cpu usage
                                                 @ob_end_clean(); 

                                                 // required for IE, otherwise Content-Disposition may be ignored
                                                 if(ini_get('zlib.output_compression'))
                                                ini_set('zlib.output_compression', 'Off');
                                                 header('Content-Type: ' . $mime_type);
                                                 header('Content-Disposition: attachment; filename="'.$name.'"');
                                                 header("Content-Transfer-Encoding: binary");
                                                 header('Accept-Ranges: bytes');

                                                 /* The three lines below basically make the 
                                                    download non-cacheable */
                                                 header("Cache-control: private");
                                                 header('Pragma: private');
                                                 header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

                                                 // multipart-download and download resuming support
                                                 if(isset($_SERVER['HTTP_RANGE']))
                                                 {
                                                    list($a, $range) = explode("=",$_SERVER['HTTP_RANGE'],2);
                                                    list($range) = explode(",",$range,2);
                                                    list($range, $range_end) = explode("-", $range);
                                                    $range=intval($range);
                                                    if(!$range_end) {
                                                        $range_end=$size-1;
                                                    } else {
                                                        $range_end=intval($range_end);
                                                    }
                                                    $new_length = $range_end-$range+1;
                                                    header("HTTP/1.1 206 Partial Content");
                                                    header("Content-Length: $new_length");
                                                    header("Content-Range: bytes $range-$range_end/$size");
                                                 } else {
                                                    $new_length=$size;
                                                    header("Content-Length: ".$size);
                                                 }
                                                 /* Will output the file itself */
                                                 $chunksize = 1*(1024*1024); //you may want to change this
                                                 $bytes_send = 0;
                                                 if ($file = fopen($file, 'r'))
                                                 {
                                                    if(isset($_SERVER['HTTP_RANGE']))
                                                    fseek($file, $range);

                                                    while(!feof($file) && 
                                                        (!connection_aborted()) && 
                                                        ($bytes_send<$new_length)
                                                          )
                                                    {
                                                        $buffer = fread($file, $chunksize);
                                                        print($buffer); //echo($buffer); // can also possible
                                                        flush();
                                                        $bytes_send += strlen($buffer);
                                                    }
                                                 fclose($file);
                                                 } else
                                                 //If no permissiion
                                                 die('Error - can not open file.');
                                                 //die
                                                die();
                                                }
                                                //Set the time out
                                                set_time_limit(0);

                                                //path to the file
                                                //$filename = $row_d['url'];
                                                /*$file_path='files/'.$_REQUEST['filename'];*/
                                                //$file_path='files/'.$filename;
                                                $filename = $sessionx;
                                                //$filename = 'The Best.mp4';
                                                $file_path='files/'.$filename;
                                                //Call the download function with file path,file name and file type
                                               /* output_file($file_path, ''.$_REQUEST['filename'].'', 'text/plain');*/
                                                output_file($file_path, $filename, 'audio/mp3');

                                                echo 'Your download is starting in a second...';
                                               // } else { echo 'Download not found!'; } 

                                        }else { 
                                               echo 'This token has already been used! You cannot Download this file.<br/>'.$_SESSION['url'];                                    
                                           }
                                 } else { 
                        //             $sessionxx = 1;
                        //             var_dump($_SESSION);
                                     echo 'This token does not exist!<br/>'; 
                                 } 
                                    mssql_free_result($token_check_s);
                            }


                            /* 
                            //To store it
                            foreach ($_REQUEST['url_i'] as $key=>$url_k) {
                            $_SESSION['REQUEST'][$key] = $url_k;
                            }

                            //Then to get it back:
                            foreach ($_SESSION['REQUEST'] as $key=>$url_k) {
                            $_REQUEST[$key] = $url_k;
                            }
                            */


                    ?>
            <br/>
            <input style="float:right;" type="submit" name="submit" value="START DOWNLOAD"/>
            </form>
        </div>
    </div>
</div>