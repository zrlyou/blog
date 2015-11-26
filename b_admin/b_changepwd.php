<?php
session_start();
if (!isset($_SESSION['username'])){
	header("Location:b_login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width,initial-scale=1.0" charset="UTF-8">
	<title>修改密码</title>
	<link rel="stylesheet" type="text/css" href="css/admin.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/public.js"></script>
</head>
<body>
<div class="column-title">
	<h2>修改密码</h2>
</div>
<div class="showform">
<form name="infoform" action="" method="post">
	<table class="table table-bordered">
		<tr class="control-tr">		
			<td class="control-td"><label class="column-name">旧密码<span style="color: red;">*</span>:</label></td>
			<td>
				<input type="password" name="oldpwd" class="input-width form-control" onblur="checkVarIsNull(this,'旧密码为不能空!','op_error')">
				<div id="op_error"></div>
			</td>
		</tr>
		<tr class="control-tr">		
			<td class="control-td"><label class="column-name">新密码<span style="color: red;">*</span>:</label></td>
			<td>
				<input type="password" name="newpwd" id="newpwd" class="input-width form-control" onblur="checkVarIsNull(this,'新密码为不能空!','np_error')">
				<div id="np_error"></div>
			</td>
		</tr>
		<tr class="control-tr">		
			<td class="control-td"><label class="column-name">确认密码<span style="color: red;">*</span>:</label></td>
			<td>
				<input type="password" name="checkpwd" class="input-width form-control" onblur="checkPwd(this)">
				<div id="cp_error"></div>
			</td>
		</tr>
	</table>
	<div>
		<input type="submit" name="submit" class="control-btn btn btn-primary" value="提交"> 
		<input type="reset" class="control-btn btn btn-primary" value="重置">
	</div>
</form>
</div>
</body>
</html>
<?php
//去掉两边的空格
@$oldpwd = trim($_POST['oldpwd']);
@$newpwd = trim($_POST['newpwd']);

if (@$_POST['submit']){
	if (empty($oldpwd) || empty($newpwd)){
		echo "<script>alert('请确定信息是否完整!');history.back();</script>";
	}
	//引入User类
	include('../include/User.class.php');
	//获取修改密码的用户名
	$username = $_SESSION['username'];
	$oldpwd = md5(md5($oldpwd).'blog');
	$newpwd = md5(md5($newpwd).'blog');
	$user = new User();
	$result = $user->savePwdForUser($username,$oldpwd,$newpwd);
	if ($result){
		echo $result;
	} 
}
?>