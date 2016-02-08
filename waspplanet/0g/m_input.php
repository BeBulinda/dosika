<!--<script src="js/vdo_pop.js"></script>-->
<?php
include('header_info.php');
error_reporting(0);
//error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', true);
session_start(); 
require_once('dbconn.php');
include 'conn/functions.php';
include 'conn/conn_x.php';
//echo "<button type='button'' id='cboxClose'>close</button>";
$content_name=mssql_fetch_assoc(mssql_query("SELECT name as cnt_name from content_type where id='21'", $dbhandle));

if(isset($_POST['subscribe'])){

	//put logic here after submit
	if(strlen($_POST['mobilenum'])==0){
		echo '<div class="container"><div class="news-paper"><div class="sign_up text-center">Please enter your phone number.';
		echo '<p><a href="input.php">&laquo;&laquo;<b>Click here</b></a> to go back and retry.</p></div></div></div>';
	}else{
		//validate number
		if(strlen($_POST['mobilenum'])<9){
			echo '<div class="container"><div class="news-paper"><div class="sign_up text-center">Invalid Phone number. Please re-enter your number.';
			echo '<p><a href="input.php">&laquo;&laquo;<b>Click here</b></a> to go back and retry.</p></div></div></div>';
		}else{
			$phone_num="+254".substr($_POST['mobilenum'], -9);
			$content_type_id = $path_final;

			$check_user=mssql_query("SELECT COUNT(*) as cnt from mobile_user where number='".$phone_num."'", $dbhandle);
			$row_check_user=mssql_fetch_assoc($check_user);
			if($row_check_user['cnt']>0){
				$row_user_id=mssql_fetch_assoc(mssql_query("SELECT id from mobile_user where number='".$phone_num."'", $dbhandle));
			}else{
				$insert_user=mssql_query("INSERT INTO mobile_user VALUES('".$phone_num."')", $dbhandle);
				$row_user_id=mssql_fetch_assoc(mssql_query("SELECT id from mobile_user where number='".$phone_num."'", $dbhandle));
			}
			##Check id user is subscribed to content
			$queryIfSubs = "SELECT COUNT(*) as cnt_sub from user_subscription where type_id='".$content_type_id."' and user_id='".$row_user_id['id']."' and state='1'";
			//echo $queryIfSubs;
			$row_check_subscription=mssql_fetch_assoc(mssql_query($queryIfSubs, $dbhandle));
			$query4TY = "select type from content_type where id = '".$content_type_id."'";
				  $getKey4TYPE = mssql_fetch_assoc(mssql_query($query4TY, $dbhandle));
				  $key4Type = $getKey4TYPE['type']; 
			if($row_check_subscription['cnt_sub']>0){
				##on demand content
				echo '<div class="container"><div class="news-paper"><div class="sign_up text-center">A download Link to '.$content_name['cnt_name'].' will be sent to you shortly. Please hold on...';
				$url_iid = getNewID('R');
				//echo $url_iid; 
				$query = "select substring(s.shortcode , 2 , len(s.shortcode ) - 1) as shortcd from shortcode s, contype_shortcode c where c.type_id = '".$content_type_id."' and s.id = c.short_id and s.state = 1 and c.stato = 1";
				$get_SC = mssql_fetch_assoc(mssql_query($query, $dbhandle));
				//echo $query;
				$sender = $get_SC['shortcd'];
                
                //Send message
				sendmsg2($phone_num, $sender, $url_iid, $content_type_id, $key4Type);
				echo '<p><a href="http://www.dosika.co.ke/waspplanet/0g/">&laquo;&laquo;<b>Click here</b></a> to go back to content.</p></div></div></div>';
			}else{
				//$pin_code = getPinCode(4);
				 
				$date_=date("Y-m-d H:i:s", time());

				$insert_user=mssql_query("INSERT INTO subscription_code (user_id, pin_code, type_id, dateadded,source_id) VALUES(".$row_user_id['id'].",'".$key4Type."','".$content_type_id."','".$date_."','')", $dbhandle);
				if($insert_user){
					$query = "select substring(s.shortcode , 2 , len(s.shortcode ) - 1) as shortcd from shortcode s, contype_shortcode c where c.type_id = '".$content_type_id."' and s.id = c.short_id and s.state = 1 and c.stato = 1";
					$get_SC = mssql_fetch_assoc(mssql_query($query, $dbhandle));
					$sender = '31305';
                    
                    //Generate token
                    $token = mt_rand(1,10000);
                    mssql_query("INSERT INTO wasp_planet.dbo.f_token(token, used) VALUES ('$token', '0')", $dbhandle);
                    //Get Url
                    $path_final = $_SESSION["path"] = $url_i_ = $_REQUEST['url_i'];
                    
                    include('dbconn.php');
                    $display_u = "SELECT * FROM games WHERE url = '$url_i_'";
                    $display_u_proc = mysql_query($display_u);
                    $row_u = mysql_fetch_assoc($display_u_proc);
                    //$g_id = $row_u["id"];
                    $u_id = $row_u["u_id"];
                    $used = 0;
                    $insert=mysql_query("INSERT INTO g_downloads(token, url, used, number, u_id) 
                                            VALUES ('$token', '$url_i_', '$used', '$phone_num', '$u_id')") or die(mysql_error());                            /* $insert=mysql_query("INSERT INTO g_downloads(token, g_id, url, used, number, u_id) 
                                            VALUES ('$token', '$g_id' , '$url_i_', '$used', '$phone_num', '$u_id')") or die(mysql_error()); */
                    //Insert to downloads table
                    if($insert){
                                  
                            //URL TO SEND TO PHONE BY SMS
                    $url_final = "http://www.dosika.co.ke/waspplanet/0g/dwn_g_process.php?token_i=".$token."&url_i=".$url_i_;
					$msg_="Thank you for subscribing to DOSIKA HD GAMES. Click here ".$url_final;
                    sendmsg($msg_,$phone_num, $sender);									
					echo '<div class="container"><div class="news-paper"><div class="sign_up text-center">
                    <span style="color:#00CC66;">Thank you for subscribing to '.$content_name['cnt_name'].'. Please confirm your subscription by sending "GAMES" to '.$sender.'. A link has been sent to your phone.</span>';
					echo '<p><a href="http://www.dosika.co.ke/waspplanet/0g/">&laquo;&laquo;Back to Content</a></p></div></div></div>';
                   } else { echo 'Not inserted.';}
				}else{
					echo 'Internal error occured. Please try again.';
					echo '<p><a href="#">&laquo;&laquo;<b>Click here</b></a> to retry.</p>';
				}
			}
		}
	}
}else{
echo '<div class="container"><div class="news-paper"><div class="sign_up text-center"><form id="frm_subcription" action="" method="post" >';
?>
<h2>Please enter your mobile number below</h2>
<h3>Mobile No:</h3>

	
    <input name="mobilenum" id="mobilenum" type="text"  style='-wap-input-format: "*N"' size="13" maxlength="12" />
	<input name="type_id" id="type_id" value="21" type="hidden"/>
	<input name="subscribe" type="submit" value="Subscribe/Request" />
	
<?php 
echo '</form></div></div></div>';
}



/*index.php?tkn='.$_REQUEST['tkn'].'*/
?>
