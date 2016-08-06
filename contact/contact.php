<?php 
include("config_cti.php"); 
$arr = $_REQUEST;

$name =$arr['name'];
$email =$arr['email'];
$phone =$arr['phone'];
$type =$arr['subject'];
if ($type == 'go') {
	$type = '定制旅行';
}
elseif ($type == 'ask') {
	$type = '业务咨询';
}
elseif ($type == 'co') {
	$type = '加盟合作';
}
$comments =$arr['comments'];

$sql="insert into message (name,email,phone,type,comments,lastdate,status) values ('$name','$email','$phone','$type','$comments',now(),'未处理')"; 
mysql_query($sql);
echo '<h1>感谢您的支持！</h1><p hidden>success</hidden>';

?>