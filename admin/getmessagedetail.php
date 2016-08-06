<?php
include_once('config_cti.php'); //连接数据库，略过，具体请下载源码查看
session_start(); 
if($_SESSION['s_islogin'] != 'true') 
{
    header("Location: index.html");
}
else
{
    $id = $_POST['id'];
    $arr['id'] = $id; 
    $query = mysql_query("select name,phone,type,comments,lastdate,status,process from message where id=$id"); //查询分页数据
    while($row=mysql_fetch_array($query)){ 
         $arr['list'][] = array(
            'name' => $row['name'],
            'phone' => $row['phone'], 
            'type' => $row['type'], 
            'comments' => $row['comments'], 
            'lastdate' => $row['lastdate'], 
            'status' => $row['status'], 
            'process' => $row['process'], 
         ); 
    }

    if ($arr['list'][0]['status'] == 0) {
    	$arr['list'][0]['status'] = '未处理';
    }
    elseif ($arr['list'][0]['status'] == 1) {
    	$arr['list'][0]['status'] = '已处理';
    }
    echo json_encode($arr); //输出JSON数据 
}
?>