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
	<title>添加博文</title>
	<link rel="stylesheet" type="text/css" href="css/admin.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript">
   	 window.UEDITOR_HOME_URL='/ueditor/';
   	 window.onload=function (){
        window.UEDITOR_CONFIG.initialFrameWidth=960;
        window.UEDITOR_CONFIG.initialFrameHeight=400;
        UE.getEditor('content');
    }

    </script>
    <script type="text/javascript" src="ueditor/ueditor.config.js"></script>
    <script type="text/javascript" src="ueditor/ueditor.all.min.js"></script>
</head>
<body>
<div class="column-title">
	<h2>添加博文</h2>
</div>
<div class="showform">
<form name="infoform" action="" method="post">
	<table class="table table-bordered">
		<tr class="control-tr">		
			<td class="control-td"><label class="column-name">标题<span style="color: red;">*</span>:</label></td>
			<td><input type="text" name="oldpwd" class="input-width form-control"></td>
		</tr>
		<tr class="control-tr">		
			<td class="control-td"><label class="column-name">内容<span style="color: red;">*</span>:</label></td>
			<td>
				<textarea name="content" id="content"></textarea>
			</td>
		</tr>
	</table>
	<div><input type="button" class="control-btn btn btn-primary" value="提交"> <input type="reset" class="control-btn btn btn-primary" value="重置"></div>
</form>
</div>
</body>
</html>