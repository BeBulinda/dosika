<?php
function sendmsg($msgtxt,$recepient,$get_SC)
{
	$scheduled=date("Y-m-d")." 00:00:01";
	$sql=mssql_query("insert into user_link_out(sender,receiver,msgtype,msg,status,flag,scheduledtime) values('".$get_SC."','".$recepient."','SMS : TEXT','".$msgtxt."','send',0, '".$scheduled."')");	
}
function sendmsg2($recepient,$get_SC, $url_iid)
{
	$msg = '<si><indication href="http://www.waspplanet.com/index.php?tkn='.$url_iid.'"action="signal-high">Click here to go to wasp planet downloads</indication></si>';
	$scheduled=date("Y-m-d")." 00:00:01";
	$sql=mssql_query("insert into user_link_out(sender,receiver,msgtype,msg,status,flag,scheduledtime) values('".$get_SC."','".$recepient."','SMS:WAPPUSH','".$msg."','send',0, '".$scheduled."')");	
	
}
function getNewID($rsn)
{
	$rsnx = "";
	$rs = RandomString(1, false);
	$rn = rand(1, 1001);
	$rsn = $rsn."". $rs ."". $rn;
	if (chkDuplicateCode($rsn) == false)
	{
		$rsnx = $rsn;
	}
	else
	{
		$rsnx = getNewID($rsn);
	}
	return $rsnx;
}
function RandomString($size, $lowerCase)
{
	$key = "";
	$possible = "abcdefghijkmnopqrstuvwxyz"; 
	$i = 0; 
	while ($i < $size) 
	{ 
		$char = substr($possible, mt_rand(0, strlen($possible)-1), 1);
		if (!strstr($key, $char)) 
		{ 
			$key .= $char;
			$i++;
		}
	}
	if ($lowerCase)
	{
		return $key;
	}
	else
	{
		return strtoupper($key);
	}
}
function chkDuplicateCode($code)
{
	$result = true;
	$counts = mssql_query("select COUNT (url_id) as cx from user_link_out where url_id= '" .$code. "'");
	$count=mssql_fetch_assoc($counts);
	$counts2 = mssql_query("select COUNT (url_id) as cx2 from user_link_out_archive where url_id = '" .$code. "'");
	$count2=mssql_fetch_assoc($counts2);
	if ($count['cx'] == 0 && $count2['cx2'] == 0)
	{
		$result = false;
	}
	return $result;
}
function getPinCode($size)
{
	$key = "";
	$possible = "0123456789"; 
	$i = 0; 
	while ($i < $size) 
	{ 
		$char = substr($possible, mt_rand(0, strlen($possible)-1), 1);
		if (!strstr($key, $char)) 
		{ 
			$key .= $char;
			$i++;
		}
	}
	return $key;
}
function get_time_difference( $start, $end )
{
	$uts['start']      =    strtotime( $start );
	$uts['end']        =    strtotime( $end );
	if( $uts['start']!==-1 && $uts['end']!==-1 )
	{
		if( $uts['end'] >= $uts['start'] )
		{
			$diff    =    $uts['end'] - $uts['start'];
			if( $days=intval((floor($diff/86400))) )
			$diff = $diff % 86400;
			if( $hours=intval((floor($diff/3600))) )
			$diff = $diff % 3600;
			if( $minutes=intval((floor($diff/60))) )
			$diff = $diff % 60;
			$diff    =    intval( $diff );            
			return( array('days'=>$days, 'hours'=>$hours, 'minutes'=>$minutes, 'seconds'=>$diff) );
		}
	}
	return( false );
}
function validateSubs($shortcode, $msisdn, $type)
{
	$check_user=mssql_query("SELECT COUNT(*) as cnt from mobile_user where number='".$msisdn."'");echo '</br>'; 
	$row_check_user=mssql_fetch_assoc($check_user);
	if($row_check_user['cnt']>0)
	{
		$check_user2=mssql_query("select state from user_subscription where short_id=(select id from shortcode where shortcode='".$shortcode."') and user_id = (select id from mobile_user where number='".$msisdn."') and type_id = '".$type."'");
		$state1=mssql_fetch_assoc($check_user2);
		$str = $state1['state'];
		if (is_null($str) || $str === '')
		{
			$rsQ = 3;//unknown state
		}else{  

			if($str == 0)
			{
				$rsQ = 0;//unsubscribed
			}
			elseif($str == 1)
			{
				$rsQ = 1;//active
			}
			else
			{
				$rsQ = 2;
			}   
		}
	}
	else
	{
		$rsQ = 2;
	}
	return $rsQ;
}

?>