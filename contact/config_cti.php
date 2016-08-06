<?php 
$conn = @mysql_connect("localhost","cti","VF6f4hAF4ZpCWJpr") or die("数据库连接出错!"); 
mysql_select_db("cti",$conn); 
mysql_query("set names 'UTF8'"); 
?> 