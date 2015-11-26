<?php
session_start();
if (!isset($_SESSION['username'])){
	header("Location:b_login.php");
}
include('../include/User.class.php');

$user = new User();
$info = $user->getUserInfo();
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width,initial-scale=1.0" charset="UTF-8">
	<title>信息修改</title>
	<link rel="stylesheet" type="text/css" href="css/admin.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/public.js"></script>
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
			<td>
				<input type="text" name="username" class="input-width form-control" value="<?php echo $info['username'];?>" onblur="checkVarIsNull(this,'用户名为不能空!','u_error')">
				<div id="u_error"></div>
			</td>
		</tr>
		<tr class="control-tr">		
			<td class="control-td"><label class="column-name">个性签名<span style="color: red;">*</span>:</label></td>
			<td>
				<input type="text" name="signature" class="input-width form-control" value="<?php echo $info['signature'];?>" onblur="checkVarIsNull(this,'个性签名为不能空!','s_error')">
				<div id="s_error"></div>
			</td>
		</tr>
		<tr class="control-tr">		
			<td class="control-td"><label class="column-name">微博地址<span style="color: red;">*</span>:</label></td>
			<td>
				<input type="text" name="weibo" class="input-width form-control" value="<?php echo $info['weibo'];?>" onblur="checkVarIsNull(this,'微博地址为不能空!','w_error')">
				<div id="w_error"></div>
			</td>
		</tr>
		<tr class="control-tr">		
			<td class="control-td"><label class="column-name">QQ空间地址<span style="color: red;">*</span>:</label></td>
			<td>
				<input type="text" name="qq_zone" class="input-width form-control" value="<?php echo $info['qq_zone'];?>" onblur="checkVarIsNull(this,'QQ空间地址为不能空!','q_error')"> 
				<div id="q_error"></div>
			</td>
		</tr>
	</table>
	<div>
		<input type="hidden" name="uid" value="<?php echo $info['uid'];?>">
		<input type="submit" name="submit" class="control-btn btn btn-primary" value="提交"> 
		<input type="reset" class="control-btn btn btn-primary" value="重置">
	</div>
</form>
</div>
</body>
</html>
<?php
//去除两边的空格
@$uid       = intval($_POST['uid']);
@$username  = trim($_POST['username']);
@$signature = trim($_POST['signature']);
@$weibo     = trim($_POST['weibo']);
@$qq_zone   = trim($_POST['qq_zone']);
//防止SQL注入
$username  = addslashes($username);
$signature = addslashes($signature);
$weibo     = addslashes($weibo);
$qq_zone   = addslashes($qq_zone);

if (@$_POST['submit']){
	if (empty($username) || empty($signature) || empty($weibo) || empty($qq_zone)){
		echo "<script>alert('请确定信息是否完整!');history.back();</script>";
	} else{
		$result = $user->saveChangeForUser($uid,$username,$signature,$weibo,$qq_zone);
		if ($result){
			echo "<script>alert('修改成功!');history.back();</script>";
		} else {
			echo "<script>alert('修改失败!');history.back();</script>";
		}
	}

}
?>