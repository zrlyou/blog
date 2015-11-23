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
	<title>博文列表</title>
	<link rel="stylesheet" type="text/css" href="css/admin.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<div class="column-title">
	<h2>博文列表</h2>
</div>
<div class="showform">
<form name="infoform" action="" method="post">
	<table class="table table-bordered">
		<tr class="active">
			<th width="8%" class="textcenter">id</th>
			<th width="35%" class="textcenter">标题</th>
			<th width="20%" class="textcenter">发布时间</th>
			<th class="textcenter">操作</th>
		</tr>
		<?php
	
		?>
	</table>
	<div>
	</div>
</form>
</div>
</body>
</html>