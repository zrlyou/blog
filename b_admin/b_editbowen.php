<?php
session_start();
if (!isset($_SESSION['username'])){
	header("Location:b_login.php");
}
@$bid = trim($_GET['bid']);
include('../include/Blog.class.php');
//实例化Blog类的对象
$blog   = new Blog();
$result = $blog->showContentForBlog($bid);
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width,initial-scale=1.0" charset="UTF-8">
	<title>编辑博文</title>
	<link rel="stylesheet" type="text/css" href="css/admin.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript">
   	 window.UEDITOR_HOME_URL='ueditor/';
   	 window.onload=function (){
        window.UEDITOR_CONFIG.initialFrameWidth=960;
        window.UEDITOR_CONFIG.initialFrameHeight=350;
        UE.getEditor('content');
    }
    </script>
    <script type="text/javascript" src="ueditor/ueditor.config.js"></script>
    <script type="text/javascript" src="ueditor/ueditor.all.min.js"></script>
</head>
<body>
<div class="column-title">
	<h2>编辑博文</h2>
</div>
<div class="showform">
<form name="infoform" action="" method="post">
	<table class="table table-bordered">
		<tr class="control-tr">		
			<td class="control-td"><label class="column-name">标题<span style="color: red;">*</span>:</label></td>
			<td><input type="text" name="title" class="input-width form-control" value="<?php echo $result['title'];?>"></td>
		</tr>
		<tr class="control-tr">		
			<td class="control-td"><label class="column-name">内容<span style="color: red;">*</span>:</label></td>
			<td>
				<textarea name="content" id="content"><?php echo $result['content'];?></textarea>
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
//去除两边的空格
@$title   = trim($_POST['title']);
@$content = trim($_POST['content']);


if (@$_POST['submit']){
	if (empty($title) || empty($content)){
		echo "<script>alert('请确认信息是否完整!');history.back();</script>";
	} else {
		//获取当前时间戳，记录博文发表时间
		$time = time();
		//引入Blog类
		//调用Blog类的addBowenForBlog方法，用于插入数据
		$message = $blog->saveBowenForBlog($bid,$title,$content);
		//调用成功后，输出返回的信息
		if ($message){			
			echo $message;
		}
	}
}

?>