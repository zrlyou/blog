<?php
session_start();
if (!isset($_SESSION['username'])){
	header("Location:b_login.php");
}
if (@$_GET['action'] == 'logout'){
	unset($_SESSION['username']);
	session_destroy();
	header("Location:b_login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width,initial-scale=1.0" charset="UTF-8">
	<title>后台首页</title>
	<link rel="stylesheet" type="text/css" href="css/admin.css">
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/admin.js"></script>
</head>
<body>
<div class="top">
	<span>后台管理系统</span>
	<div class="top-right">
		<p>上次登录时间:<?php echo $_SESSION['last_logintime'];?> &nbsp&nbsp  上次登录ip:<?php echo $_SESSION['last_loginip'];?></p>
		<span>您好！<?php echo $_SESSION['username'];?></span>
		<span><a href="index.php?action=logout">注销</a></span>
	</div>
</div>
<div class="left">
	<ul>
		<li>
			<a class="a_list a_list1">新闻相关</a>
			<div class="menu_list" style="display:none;">
				<a class="lista_first" href="#" target="iframe">新闻列表</a>
				<a href="#" target="iframe">添加新闻</a>
			</div>
		</li>
		<li>
			<a class="a_list a_list2">栏目相关</a>
			<div class="menu_list" style="display:none;">
				<a class="lista_first" href="#" target="iframe">栏目列表</a>
				<a href="#" target="iframe">添加栏目</a>
			</div>
		</li>
		<li>
			<a class="a_list a_list3">管理员相关</a>
			<div class="menu_list" style="display:none;">
				<a class="lista_first" href="#" target="iframe">管理员列表</a>
				<a href="#" target="iframe">添加管理员</a>
			</div>
		</li>
	</ul>
</div>
<div class="right">
	<iframe name="iframe" src=""></iframe>
</div>
</body>
</html>