<?php
session_start(); 
if($_SESSION['s_islogin'] == 'true') 
{
?>

<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8"/>
	<title>CTI后台管理</title>
	
	<link rel="stylesheet" href="css/layout.css" type="text/css" media="screen" />
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<script src="js/jquery-1.5.2.min.js" type="text/javascript"></script>
	<script src="js/hideshow.js" type="text/javascript"></script>
	<script src="js/jquery.tablesorter.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/jquery.equalHeight.js"></script>
	<script type="text/javascript" src="js/getmessage.js"></script>
	<script type="text/javascript">
	$(document).ready(function() 
    	{ 
      	  $(".tablesorter").tablesorter(); 
   	 } 
	);
	$(document).ready(function() {

	//When page loads...
	$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content

	//On Click Event
	$("ul.tabs li").click(function() {

		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content

		var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active ID content
		return false;
	});

});
    </script>
    <script type="text/javascript">
    $(function(){
        $('.column').equalHeight();
    });
</script>

</head>


<body>

	<header id="header">
		<hgroup>
			<h1 class="site_title"><a href="index.html">CTI后台管理</a></h1>
			<h2 class="section_title">工作台</h2><div class="btn_view_site"><a href="http://www.ctigloble.com">查看主页</a></div>
		</hgroup>
	</header> <!-- end of header bar -->
	
	<section id="secondary_bar">
		<div class="user">
			<p>Admin</p>
		</div>
		<div class="breadcrumbs_container">
			<article class="breadcrumbs"><a href="index.html">CTI后台管理</a> <div class="breadcrumb_divider"></div> <a class="current">留言查看</a></article>
		</div>
	</section><!-- end of secondary bar -->
	
	<aside id="sidebar" class="column">
		<h3>功能</h3>
		<ul class="toggle">
			<li class="icn_new_article"><a href="#">留言查看</a></li>
		</ul>
		<h3>管理</h3>
		<ul class="toggle">
			<li class="icn_jump_back"><a href="logout.php">登出</a></li>
		</ul>
		
		<footer>
			<hr />
			<p><strong>Copyright &copy; 2015 CTI后台管理</strong></p>
			<p><a href="http://blog.ucare.me" target="_blank">Copyright © 2015 Chuck Studio<br />C&amp;T International Cultural Communiaction LLC</a></p>
		</footer>
	</aside><!-- end of sidebar -->
	
	<section id="main" class="column">
		
		<article class="module width_3_quarter">
		<header><h3 class="tabs_involved">留言列表</h3>
		<ul class="tabs">
   			<li><a href="#tab1">未处理</a></li>
    		<li><a href="#tab2">已处理</a></li>
		</ul>
		</header>

		<div class="tab_container">
			<div id="tab1" class="tab_content">
			<table class="tablesorter" cellspacing="0"> 
			<thead> 
				<tr>
   					<th>姓名</th> 
    				<th>Email</th> 
    				<th>电话</th> 
    				<th>咨询类型</th> 
    				<th>时间</th> 
    				<th>操作</th>
				</tr> 
			</thead> 
			<tbody id="list_message0"></tbody>
			</table>
			<div id="pagecount0"></div>
			</div><!-- end of #tab1 -->
			
			<div id="tab2" class="tab_content">
			<table class="tablesorter" cellspacing="0"> 
			<thead> 
				<tr>
   					<th>姓名</th> 
    				<th>Email</th> 
    				<th>电话</th> 
    				<th>咨询类型</th> 
    				<th>时间</th> 
    				<th>操作</th>
				</tr> 
			</thead> 
			<tbody id="list_message1"></tbody>
			</table>
			<div id="pagecount1"></div>
			</div><!-- end of #tab2 -->
			
		</div><!-- end of .tab_container -->
		
		</article><!-- end of content manager article -->
		
		<article class="module width_quarter">
			<header><h3>查看信息</h3></header>
			<div class="message_list">
				<div class="module_content" id="message_detail">
				</div>
			</div>
			<footer>
				<form id="process" name="process" class="post_message" action="process.php?m=update">
					<input name="process_info" type="text" id="process_info" value="输入处理信息" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;" />
					<input type="submit" name="submit" id="submit" class="btn_post_message" value="" />
					<input type="hidden" name="post_id" id="post_id" value="" /> 
					<input type="hidden" name="m" id="m" value="update" /> 
				</form>
			</footer>
		</article><!-- end of messages article -->
		
		<div class="clear"></div>
		
		<div class="spacer"></div>
	</section>


</body>

</html>

<?php
}
else
{
	header("Location: index.html");
}
?>