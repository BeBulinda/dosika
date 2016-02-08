<?php 
/*if ($_SERVER['SERVER_PORT']!=443)
{
$url = "https://". $_SERVER['SERVER_NAME'] . ":443".$_SERVER['REQUEST_URI'];
header("Location: $url");
}
*/
error_reporting(0);
session_start(); 
require_once('connections/conn_x.php');
include 'resources/functions.php';
//include 'resources/mob_detect.php';
if(isset($_REQUEST['tkn'])){
	$get_type_id = mssql_fetch_assoc(mssql_query("select type_id from content_link where id='".$_REQUEST['req']."'", $dbhandle)); 
	$shortcode=mssql_fetch_assoc(mssql_query("SELECT * FROM user_link_out where url_id='".$_REQUEST['tkn']."'", $dbhandle));
	$msisdn=$shortcode['receiver'];
	$shortcode1 = "+".$shortcode['sender'];
	$respState = validateSubs($shortcode1, $msisdn, $get_type_id['type_id']);
	//echo '<br>'.$msisdn.$shortcode1.$get_type_id['type_id'];
	//echo '<br>here????'.$respState;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="yes" name="apple-mobile-web-app-capable" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
<link rel="apple-touch-icon" href="images/iphone-icon.png" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<title>WASP Planet</title>
<script type="text/javascript">
	//function reloadPage()
	//{
		//alert("i was clicked");
		//location.replace('index.php?tkn');
	//}
</script>
</head>
<body>
<div id="nameplate"><h1><table align="center">
  <tr>
    <td valign="middle">WASP Planet</td>
	<td valign="middle"><a href="<?="index.php?tkn=".$_GET['tkn']?>"><img src="images/logo.png" alt="" width="94" height="40"/></a></td>
  </tr>
</table>
</h1></div>
<!--div id="topbar">

</div-->

<div id="content">
<ul class="pageitem">
<li class="textbox"><p>Welcome to WASP Planet. </p>
<?php if($_REQUEST['req'] || $_REQUEST['subscr']){?>
<div class="nav-button right">
<a href="<?="index.php?tkn=".$_GET['tkn']?>" class="noeffect">
<img src="images/go-back-icon.png" alt="Back to Content"  title="Back to Content" height="20" width="20" /></a>
</div>
<?php }?>

</li>

<?php
#########*****DEFAULT CONTENT************###########################################################

if(!$_REQUEST['req'] && !$_REQUEST['subscr'])
{
 $contents=mssql_query("SELECT * FROM content_type where state=1 order by indicator asc", $dbhandle);
 for($i=0;$i<mssql_num_rows($contents);$i++)
 {
  $content = mssql_fetch_assoc($contents);
  ?>
  <li class="menu"><a href="<?="index.php?tkn=".$_GET['tkn']."&req=".$content['id']?>">
  <img alt="<?=$content['name']?>" src="<?="con_wasp/".str_replace(" ","_",$content['name'])."/".$content['icon']?>"/>
  <span class="name"><?=$content['name']?></span><span class="arrow"></span></a></li>
  <?php 
 }
}
#############********DISPLAY SUB-CATEGORIES FROM MAIN CONTENT************###################################
else
{

 if(!$_REQUEST['cont']  && !$_REQUEST['subscr'])
 {
  $req=mssql_fetch_assoc(mssql_query("SELECT * FROM content_type where id=".$_REQUEST['req'], $dbhandle));
  ?>
  <li class="menu">
   <a href="#">
	<img alt="<?=$req['name']?>" src="<?="con_wasp/".str_replace(" ","_",$req['name'])."/".$req['icon']?>"/><span class="name"><?=$req['name']?></span>
   </a>
  </li>
	  <hr />														      
  <?php
  if($respState == 2){
   echo '<p><a href=index.php?tkn='.$_GET['tkn'].'&subscr='.$req['id'].'><b>CLICK HERE</b></a> to subscribe to '.$req['name'].'</p>';
  }
	$q_result=mssql_query("SELECT * FROM content_link where type_id=".$_REQUEST['req']." and state=1", $dbhandle);
	$next_row = mssql_fetch_assoc($q_result); //fetch first row
	$get_flag=mssql_fetch_assoc(mssql_query("SELECT flag FROM user_link_out where url_id='".$_REQUEST['tkn']."'", $dbhandle));
	$get_type_id = mssql_fetch_assoc(mssql_query("select type_id from content_link where id='".$_REQUEST['req']."'", $dbhandle));	
	//$get_typeid=mssql_fetch
	if(mssql_num_rows($q_result)==0)
	{
	 echo "<p>Content is currently not available. Please check in later.</p";
	}
    echo "<table>\n"; //open table tag
	do 
	{
	 echo "<tr>"; //open row tag
	 for ($i=1 ; $i <= 2 ; $i++ )
	 { //loops as many times as $cant_cols_tbl
	  $row=$next_row; //assign $row, next row will be checking next one, that avoids starting a new row when it's gonna be empty
	  echo '<td> <div align="center">'; //open TD tag
	  if (!$row)
	  { 
	   echo "";
	  }
	  else
	  {
	  //echo 'flsg='.$get_flag['flag'];
	   if($get_flag['flag']==1) //Firstime unsubscribed user. 
	   {
			//echo 'fault here'.$get_type_id['type_id'].$respState;
		   //<a href="index.php?tkn='.$_REQUEST['tkn'].'&req='.$_REQUEST['req'].'&cont='.$row['id'].'"></a>
			echo 
			'
			 <img alt="'.$req['name'].'" src="con_wasp/'.str_replace(" ","_",$req['name']).'/'.$row['thumbnail'].'" height="70" width="70"/>
			 <br>
			';
			echo '<span style="font-size:10px;">'.$row['name'].'</span>';
			echo'<br>';
			echo
			'
			 <a href="index.php?tkn='.$_REQUEST['tkn'].'&req='.$_REQUEST['req'].'&cont='.$row['id'].'"><a href="rtsp://197.254.13.244/'.$row['name'].'.3gp'.'">
				<img alt="'.$req['name'].'" src="con_wasp/preview.png"/>								   
			 </a>';
			if($respState == 1){
			echo '<a href="download.php?tkn='.$_REQUEST['tkn'].'&req='.$_REQUEST['req'].'&cont='.$row['id'].'">
				<img alt="'.$req['name'].'" src="con_wasp/download.png"/>			 
			 </a>
			';
			}elseif($respState == 0){
				echo '<br><span style="font-size:10px;"><a href=index.php?tkn='.$_GET['tkn'].'&subscr='.$req['id'].'>Resubscribe to download</a></span>
			';
			}else{
			echo '<br><span style="font-size:10px;"><a href=index.php?tkn='.$_GET['tkn'].'&subscr='.$req['id'].'>Subscribe to download</a></span>
			';
			}
	   }
	   elseif($get_flag['flag']==2) //Not subscribed or download subscriptions over.???? #########------NEED TO DETERMINE FROM TOKEN, AND USER SUBCRIPTION TABLE---######
	   { 
	    //check subscription
		
		echo'<br>';
		echo 
		'
		 <img alt="'.$req['name'].'" src="con_wasp/'.str_replace(" ","_",$req['name']).'/'.$row['thumbnail'].'" height="70" width="70"/>
		 <br>
		';
		echo '<span style="font-size:10px;">'.$row['name'].'</span>';
		echo'<br>';
		echo 
		'
		 <a href="index.php?tkn='.$_REQUEST['tkn'].'&req='.$_REQUEST['req'].'&cont='.$row['id'].'"><a href="rtsp://197.254.13.244/'.$row['name'].'.3gp'.'">
		 <img alt="'.$req['name'].'" src="con_wasp/preview.png"/>								   
		 </a>
		';
		if($respState == 0){
		echo '<br><span style="font-size:10px;"><a href=index.php?tkn='.$_GET['tkn'].'&subscr='.$req['id'].'>Resubscribe to download</a></span>';
		}elseif($respState == 2){
		echo '<br><span style="font-size:10px;"><a href=index.php?tkn='.$_GET['tkn'].'&subscr='.$req['id'].'>Subscribe to download</a></span>';
		}
	   }else{
		   echo'<br>';
			echo 
			'
			 <img alt="'.$req['name'].'" src="con_wasp/'.str_replace(" ","_",$req['name']).'/'.$row['thumbnail'].'" height="70" width="70"/>
			 <br>
			';
			echo '<span style="font-size:10px;">'.$row['name'].'</span>';
			echo'<br>';
			echo 
			'
			 <a href="index.php?tkn='.$_REQUEST['tkn'].'&req='.$_REQUEST['req'].'&cont='.$row['id'].'"><a href="rtsp://197.254.13.244/'.$row['name'].'.3gp'.'">
			 <img alt="'.$req['name'].'" src="con_wasp/preview.png"/>								   
			 </a>
			';
			//echo 'fauklts';
			if($respState == 0){
			echo '<br><span style="font-size:10px;"><a href=index.php?tkn='.$_GET['tkn'].'&subscr='.$req['id'].'>Resubscribe to download</a></span>';
			}elseif($respState == 2){
			echo '<br><span style="font-size:10px;"><a href=index.php?tkn='.$_GET['tkn'].'&subscr='.$req['id'].'>Subscribe to download</a></span>';
			}else{
			echo '<br><span style="font-size:10px;">Sorry the link is invalid!</span>';
			}
	   }
	  }
	  $next_row = mssql_fetch_array($q_result); //retrieve next row
	  echo '</div></td>'; //close TD
	 } //close for loop
	 echo "</tr>\n"; //close row
	} while ($next_row); 
	//mssql_free_result($next_row);
	echo "</table>\n"; //close table
   } 
  }
  ###########*******SUBSCRIPTION REQUEST************###########################################################
  if($_REQUEST['subscr'])
  {
  echo "<hr>";
    $content_name=mssql_fetch_assoc(mssql_query("SELECT name as cnt_name from content_type where id='".$_REQUEST['subscr']."'", $dbhandle));

  if($_POST['subscribe']){
  //put logic here after submit
  if(strlen($_POST['mobilenum'])==0){
  echo 'Please enter your phone number.';
  echo '<p><a href="index.php?tkn='.$_REQUEST['tkn'].'">&laquo;&laquo;<b>CLICK HERE</b></a> to go back and try again..</p>';
			

  }else{
  //validate number
  if(strlen($_POST['mobilenum'])<9){
  echo 'Invalid Phone number. Please re-enter your number.';
  echo '<p><a href="index.php?tkn='.$_REQUEST['tkn'].'">&laquo;&laquo;<b>CLICK HERE</b></a> to go back and try again..</p>';

  }else{
  $phone_num="+254".substr($_POST['mobilenum'], -9);
  $content_type_id=$_REQUEST['subscr'];

  $check_user=mssql_query("SELECT COUNT(*) as cnt from mobile_user where number='".$phone_num."'", $dbhandle);
  $row_check_user=mssql_fetch_assoc($check_user);
  if($row_check_user['cnt']>0){
    $row_user_id=mssql_fetch_assoc(mssql_query("SELECT id from mobile_user where number='".$phone_num."'", $dbhandle));
	
	}else{
  	$insert_user=mssql_query("INSERT INTO mobile_user VALUES('".$phone_num."')", $dbhandle);
  	$row_user_id=mssql_fetch_assoc(mssql_query("SELECT id from mobile_user where number='".$phone_num."'", $dbhandle));
	}
	##Check id user is subscribed to content
	$row_check_subscription=mssql_fetch_assoc(mssql_query("SELECT COUNT(*) as cnt_sub from user_subscription where type_id='".$_REQUEST['subscr']."' and user_id='".$row_user_id['id']."' and state=1", $dbhandle));
	
	if($row_check_subscription['cnt_sub']>0){
	
	echo 'You are already subscribed to '.$content_name['cnt_name'];
	echo '<p><a href="index.php?tkn='.$_REQUEST['tkn'].'">&laquo;&laquo;<b>CLICK HERE</b></a> to go back to content.</p>';
	}else{
	$pin_code = getPinCode(4);
    $date_=date("Y-m-d H:i:s");

 	$insert_user=mssql_query("INSERT INTO subscription_code VALUES(".$row_user_id['id'].",'".$pin_code."','".$content_type_id."','".$date_."')", $dbhandle);
	if($insert_user){
	$msg_="Thank you for subscribing to ".$content_name['cnt_name']." content. Please confirm your subscription by sending the pin: ".$pin_code." to 5367. waspafrica.com";
	sendmsg($msg_,$phone_num);

 	echo '<span style="color:#00CC66;">Thank you for subscribing to '.$content_name['cnt_name'].' content. A confirmation message with a pin will be sent to you shortly.</span>';
	echo '<p><a href="index.php?tkn='.$_REQUEST['tkn'].'">&laquo;&laquo;Back to Content</a></p>';
	}else{
	echo 'Internal error occured. Please try again.';
	echo '<p><a href="index.php?tkn='.$_REQUEST['tkn'].'">&laquo;&laquo;<b>CLICK HERE</b></a> to go back and try again..</p>';
	}
  }}}}else{
  
  echo '<p>Please enter your mobile number below to subscribe.</p>';
  echo '<form id="frm_subcription" action="" method="post" >';
  echo '<table>
  <tr>
    <td>Mobile(254722123456)</td>
    <td><input name="mobilenum" id="mobilenum" type="text" size="13" maxlength="12" />
	<input name="type_id" id="type_id" value="'.$_REQUEST['subscr'].'" type="hidden"/></td>
  </tr>
   
  <tr>
    <td>&nbsp;</td>
    <td><input name="subscribe" type="submit" value="Subscribe" /></td>
  </tr>
</table>';
echo '</form>';

  }}

echo '<hr>';
echo '<br>';
echo '<a href="http://www.waspafrica.com/inside.php?sid=15">Terms & Conditions</a> | <a href="#">FAQ </a> | <a href="http://www.waspafrica.com/inside.php?sid=5">Contact Us </a>';

?>

</ul>
</div>
<div id="footer"></div>
</body>
</html>
