<?php
////设置文件编码为utf-8
header('Content-Type:text/html;charset=utf-8');
//引用数据库类
// include('../include/DbMysqli.class.php');
// require('../include/DbMysqli.class.php');
$username = @trim($_POST['username']);
$password = @trim($_POST['password']);

echo $username;
echo $password;
if (!@$_POST['submit']){
	echo '你没有权限访问改页面!系统将在3秒后之后自动跳转到登录页面~';
	header("refresh:3;url=b_login.php");
} else {
	if (empty($username)|| empty($password)){
		echo '用户名或者密码为空!';
		header("refresh:3;url=b_login.php");
	}
}
?>