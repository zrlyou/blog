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
	<title>登录记录</title>
	<link rel="stylesheet" type="text/css" href="css/admin.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<div class="column-title">
	<h2>登录记录</h2>
</div>
<div class="showform">
<form name="infoform" action="" method="post">
	<table class="table table-bordered">
		<tr class="active">
			<th width="8%" class="textcenter">id</th>
			<th width="35%" class="textcenter">登录用户名</th>
			<th width="20%" class="textcenter">登录ip</th>
			<th width="20%" class="textcenter">登录时间</th>
			<th class="textcenter">状态</th>
		</tr>
		<?php
			include('../include/Log.class.php');
			$log = new Log();
			$result= $log->showLogToAdmin();
			if ($result){
				for ($i=0;$i<count($result);$i++){
					if ($result[$i]['status']){
						$status = '成功';
					} else {
						$status = '失败';
					}
					echo '<tr class="textcenter"><td>'.$result[$i]['lid'].'</td><td>'.$result[$i]['username'].'</td><td>'.$result[$i]['loginip'].'</td><td>'.date("Y-m-d H:i:s",$result[$i]['logintime']).'</td><td>'.$status.'</td></tr>';
				}
			} else{
				echo '没有数据...';
			}
		?>
	</table>
	<div>
	</div>
</form>
</div>
</body>
</html>