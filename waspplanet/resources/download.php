<?php
session_start(); 
require_once('connections/conn_x.php');

if($_REQUEST['cont'])
{//activate download if download requested by user

	$content_link=mssql_fetch_assoc(mssql_query("SELECT * FROM content_link where id='".$_REQUEST['cont']."'", $dbhandle));
	$content_type=mssql_fetch_assoc(mssql_query("SELECT * FROM content_type where id='".$content_link['type_id']."'", $dbhandle));
	$q_result=mssql_query("SELECT * FROM content_link where type_id=".$_REQUEST['req']." and state=1", $dbhandle);
	$get_flag=mssql_fetch_assoc(mssql_query("SELECT flag FROM user_link_out where url_id='".$_REQUEST['tkn']."'", $dbhandle));
	
    if($get_flag['flag']==1)
	{
	
	$file='con_wasp/'.str_replace(" ","_",$content_type['name']).'/'.$content_link['link'];
	$filename=basename($content_link['link']).PHP_EOL;
	$ext = end(explode('.', $filename));

	 	//header('Location: complete.php');
        header('Content-type: application/'.$ext);
        header('Content-Disposition: attachment; filename='.$filename);
		//readfile($filename)
        $f = file_get_contents($file);
        print $f;

	    //Update downloaded
		$update_download=mssql_query("UPDATE user_link_out set link_id=".$_REQUEST['cont'].", flag='2' where url_id='".$_REQUEST['tkn']."'", $dbhandle);
		//echo here;
	}
	else
	{	//retains user on current submenu page but removes download button.	-Works but needs refresh of page first-																
	 echo "<meta http-equiv='refresh' content='0;url=http://localhost/test_m/index.php?tkn=".$_REQUEST['tkn']."&req=".$_REQUEST['req']."'>";	
     //echo('<meta http-equiv="refresh" content="20">'); 	 
	}
}
	//echo "<meta http-equiv='refresh' content='0;url=http://localhost/wasp_planet/index.php'>";
	//<a href="index.php?tkn='.$_REQUEST['tkn'].'&req='.$_REQUEST['req'].'&cont='.$row['id'].'">
	//echo "<meta http-equiv='refresh' content='0;url=http://localhost/wasp_planet/index.php?tkn=&req=".$_REQUEST['req']."'>";
	?>