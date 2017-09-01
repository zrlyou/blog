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
	<h2>文章列表</h2>
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
        if(!isset($_GET['page']) || empty($_GET['page'])){
            $page = 1;
        } else {
            $page = intval($_GET['page']);
        }
		include('../include/Blog.class.php');
		$blogs = new Blog();
		$result = $blogs->showListForBlog($page);
		if ($result){
			for ($i=0;$i<count($result);$i++){
				echo '<tr class="textcenter"><td>'.$result[$i]['bid'].'</td><td>'.$result[$i]['title'].'</td><td>'.date("Y-m-d H:i:s",$result[$i]['time']).'</td><td><a href="b_editbowen.php?bid='.$result[$i]['bid'].'">[编辑]</a><a class="control-a" href="b_deletebowen.php?bid='.$result[$i]['bid'].'" onClick="return isConfirm();">[删除]</a></td></tr>';
			}
		} else {
			echo '<tr class="textcenter"><td colspan="4" width="100%">没有数据...</td></tr>';
		}
		?>
	</table>
    <div class="pages">
		<ul class="pagination">
		<?php
            $pages = new Pages();
			$all_pages = $pages->getPages('blog');
            if($all_pages){
                for($i=0; $i<$all_pages; $i++){
                    $p = $i + 1;
                    echo '<li><a href="b_bowenlist.php?page='.$p.'">'.$p.'</a></li>';
                }
            } else {
                echo "No paging!";
            }
		?>
		</ul>
	</div>
	<div>
	</div>
</form>
</div>
<script type="text/javascript">
	function isConfirm(){
		var str="确定删除该博文?";
	if(confirm(str)==true){
		return true;
	} else{
		return false;
	}
}
</script>
</body>
</html>