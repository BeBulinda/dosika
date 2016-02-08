<?php
ob_start();
session_start();
include('dbconn.php');
include('header_info.php');
include('../conn/conn_x.php');
//error_reporting( error_reporting() & ~E_WARNING);
//error_reporting( error_reporting() & ~E_NOTICE );
$url_i_=$_SESSION['url'] = print_r($_REQUEST['url_i'], true);
$token=$_SESSION['token'] = print_r($_REQUEST['token_i'], true);
include('../track/track.php');         
    echo 'Download starting....<br/>';
    $token_check_s = mssql_query("SELECT * FROM wasp_planet.dbo.f_token WHERE token ='$token'", $dbhandle) or die(mssql_error());
    //May not be running
    $token_s = mssql_fetch_array($token_check_s);//May not be running
    $row_d = mysql_fetch_assoc($url_check);
             if($token_s){
                 if($token_s['used']==0){
                    /* Download Documenting */
                    $display_u = "SELECT * FROM games WHERE url = '$url_i_'";
                    $display_u_proc = mysql_query($display_u);
                    $row_u = mysql_fetch_assoc($display_u_proc);
                    $g_id = $row_u["g_id"];
                    $u_id = $row_u["u_id"];
                    $used = 1;
                    //Update used to 1
                     $used_update = mssql_query("UPDATE wasp_planet.dbo.f_token SET used = '1' WHERE token = '$token'", $dbhandle);
                     if($used_update){ ?>
                    <p> The code <?php echo $token; ?> is valid.</p> 
                    <p>The file <?php echo $url_i_; ?> is now downloading....</p>
                    <p>Go to: <a href="http://www.dosika.co.ke/waspplanet/0g/">Dosika HD Games</a> for more games...</p>
                         <?php
                         function output_file($file, $name, $mime_type='')
                            {
                             /*This function takes a path to a file to output ($file),  the filename that the browser will see ($name) and  the                                     MIME type of the file ($mime_type, optional)*/
                             //Check the file premission
                             if(!is_readable($file)) die('File not found or inaccessible!');
                             $size = filesize($file);
                             $name = rawurldecode($name);
                             /* Figure out the MIME type | Check in array */
                             $known_mime_types=array(
                                "pdf" => "application/pdf",
                                "apk" => "application/vnd.android.package-archive",
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
                             //Turn off output buffering to decrease cpu usage
                             @ob_end_clean();
                             //Required for IE, otherwise Content-Disposition may be ignored
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
                             //Multipart-download and download resuming support
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
                             $chunksize = 1*(1024*1024); //You may want to change this
                             $bytes_send = 0;
                             if ($file = fopen($file, 'r'))
                             {
                                if(isset($_SERVER['HTTP_RANGE']))
                                fseek($file, $range);
                                while(!feof($file) && (!connection_aborted()) && ($bytes_send<$new_length))
                                {
                                    $buffer = fread($file, $chunksize);
                                    print($buffer); //echo($buffer); // Can also possible
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
                            $filename = $url_i_;
                            $file_path='../games/'.$filename;
                            //Call the download function with file path,file name and file type
                            output_file($file_path, $filename, 'application/vnd.android.package-archive');
                            echo 'Your download is starting in a second...';                        
                    }else { 
                           echo 'This token has already been used! You cannot Download this file.<br/>'.$_SESSION['url'];                            
                       }
             } else { 
                 echo 'This link does not exist or is already used! Token '.$token.' Invalid!<br/>'; 
             } 
                mssql_free_result($token_check_s);
             }else{
                 echo 'Error validating your token number!. Please contact us.';
             }
?>           