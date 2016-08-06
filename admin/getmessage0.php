<?php
include_once('config_cti.php');
session_start(); 
if($_SESSION['s_islogin'] != 'true') 
{
	header("Location: index.html");
}
else
{
	$page = intval($_POST['pageNum']);
	 
	$result = mysql_query("select id from message where status=0"); 
	$total = mysql_num_rows($result);
	$pageSize = 10;
	$totalPage = ceil($total/$pageSize);
	 
	$startPage = $page*$pageSize;

	$arr['total'] = $total; 
	$arr['pageSize'] = $pageSize; 
	$arr['totalPage'] = $totalPage; 
	$query = mysql_query("select id,name,email,phone,type,lastdate from message  where status=0 order by id asc limit  
	$startPage,$pageSize");
	while($row=mysql_fetch_array($query)){ 
	     $arr['list'][] = array( 
	        'id' => $row['id'],
	        'name' => $row['name'], 
	        'email' => $row['email'], 
	        'phone' => $row['phone'], 
	        'type' => $row['type'], 
	        'lastdate' => $row['lastdate'], 
	     ); 
	} 
	echo json_encode($arr);
}
?>