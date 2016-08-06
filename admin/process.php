<?php
include("config_cti.php"); 

session_start(); 
if($_SESSION['s_islogin'] != 'true') 
{
	header("Location: index.html");
}
else
{
	$arr = $_REQUEST;
	if ($arr['m'] == 'update') {
		$id =$arr['post_id'];
		$process =$arr['process_info'];

		$sql="update message set process='$process',status=1 where id=$id"; 
		mysql_query($sql);
	}
	elseif ($arr['m'] == 'del') {
		$id =$arr['post_id'];
		$sql="delete from message where id=$id"; 
		mysql_query($sql);
	}
}
?>