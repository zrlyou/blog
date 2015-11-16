<?php
session_start();
if (!isset($_SESSION['username'])){
	header("Location:b_login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width,initial-scale=1.0" charset="UTF-8">
	<title>修改密码</title>
	<link rel="stylesheet" type="text/css" href="css/admin.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
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
			<td><input type="text" name="oldpwd" class="input-width form-control"></td>
		</tr>
		<tr class="control-tr">		
			<td class="control-td"><label class="column-name">新密码<span style="color: red;">*</span>:</label></td>
			<td><input type="text" name="newpwd" class="input-width form-control"></td>
		</tr>
		<tr class="control-tr">		
			<td class="control-td"><label class="column-name">确认密码<span style="color: red;">*</span>:</label></td>
			<td><input type="text" name="checkpwd" class="input-width form-control"></td>
		</tr>
	</table>
	<div><input type="button" class="control-btn btn btn-primary" value="提交"> <input type="reset" class="control-btn btn btn-primary" value="重置"></div>
</form>
</div>
</body>
</html>