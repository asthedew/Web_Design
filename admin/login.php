<?php
require('config_cti.php');
$username=$_REQUEST['username'];
$passwd=$_REQUEST['password'];
session_start();
$_SESSION['s_username']=$username;
$_SESSION['s_password']=$username;
$query_user="select * from users where username = '$username' and password = '$passwd'";
$result = mysql_query($query_user); 
$num_results = mysql_num_rows($result);
if($num_results==0)
{
	$_SESSION['s_islogin']='false';
    echo '用户名密码错误，请重新登陆！';
?>
<p><a href="index.html">返回登陆</a></p>
<?php
}else{
$_SESSION['s_islogin']='true';
header("Location: admin.php");
}
?>