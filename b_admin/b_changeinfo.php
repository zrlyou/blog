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
	<title>信息修改</title>
	<link rel="stylesheet" type="text/css" href="css/admin.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<div class="column-title">
	<h2>信息修改</h2>
</div>
<div class="showform">
<form name="infoform" action="" method="post">
	<table class="table table-bordered">
		<tr class="control-tr">		
			<td class="control-td"><label class="column-name">用户名<span style="color: red;">*</span>:</label></td>
			<td><input type="text" name="username" class="input-width form-control"></td>
		</tr>
		<tr class="control-tr">		
			<td class="control-td"><label class="column-name">个性签名<span style="color: red;">*</span>:</label></td>
			<td><input type="text" name="signature" class="input-width form-control"></td>
		</tr>
		<tr class="control-tr">		
			<td class="control-td"><label class="column-name">微博<span style="color: red;">*</span>:</label></td>
			<td><input type="text" name="weibo" class="input-width form-control"></td>
		</tr>
		<tr class="control-tr">		
			<td class="control-td"><label class="column-name">QQ空间<span style="color: red;">*</span>:</label></td>
			<td><input type="text" name="qq_zone" class="input-width form-control"></td>
		</tr>
	</table>
	<div><input type="button" class="control-btn btn btn-primary" value="提交"> <input type="reset" class="control-btn btn btn-primary" value="重置"></div>
</form>
</div>
</body>
</html>