<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width,initial-scale=1.0" charset="UTF-8">
	<title>后台登录</title>
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
	<div class="top">
		<span>后台登录</span>
	</div>
	<div class="login">
		<form name="loginform" id="loginform" action="b_checklogin.php" method="post">
			<div class="login_title">
				<h3>后台登录</h3>	
			</div>
			
			<div class="input-group login_input">
        		<span class="input-group-addon">用户名:</span>
         		<input type="text" class="form-control" name="username"> <!-- <div class="error">测试</div>  -->
      		</div>
      		<div class="input-group login_input">
        		<span class="input-group-addon">密&nbsp&nbsp&nbsp码:</span>
         		<input type="password" class="form-control" name="password" >
      		</div>
			<div style="text-align:center;">
				<input type="submit" name="submit" value="登录" class="btn btn-primary">
			</div>
		</form>
	</div>
</body>
</html>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/login.js"></script>