<?php
/**
 * 
 */
////设置文件编码为utf-8
header('Content-Type:text/html;charset=utf-8');
//引入User类 
require('../include/User.class.php');


//去除两边的空格
@$username = trim($_POST['username']);
@$password = trim($_POST['password']);

//防SQL注入
@$username = addslashes($username);
@$password = addslashes($password);
//记录登录信息
function recordLogin($username,$status){
	include('../include/Log.class.php');
	$loginip = $_SERVER['REMOTE_ADDR'];
	$logintime = time();
	$log = new Log();
	$log->recordLogForLogin($username,$loginip,$logintime,$status);
}
//用户验证
function checkUser($username,$password){
	//对密码进行两次md5加密
	$pwd = md5(md5($password).'blog');
	$user = new User();
	if ($user->userAuthentication($username,$pwd)){
		session_start();
		$_SESSION['username'] = $username;
		header("Location:index.php");
		recordLogin($username,1);
	} else {
		echo "<script>alert('用户名或者密码错误!请重新输入!');</script>";
		header('refresh:0;url=b_login.php');
		recordLogin($username,0);
	}
}

if (!@$_POST['submit']){
	echo '你没有权限访问该页面!系统将在3秒后之后自动跳转到登录页面~';
	header("refresh:3;url=b_login.php");
} else {
	if (empty($username)|| empty($password)){
		echo "<script>alert('用户名或者密码为空!');</script>";
		header("refresh:0;url=b_login.php");
	} else{
		checkUser($username,$password);
	}
}
?>