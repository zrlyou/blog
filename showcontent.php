<?php
include 'include/Index.class.php';
$bid = trim($_GET['bid']);
if (!$bid) echo "<script>alert('参数错误!');history.back();</script>";
$index = new Index();
$bowen = $index->getBowenToIndex($bid);
$userinfo = $index->getUserInfoToIndex();
$bloginfo = $index->getLatestList();
?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width,initial-scale=1.0" charset="UTF-8">
	<title><?php echo $bowen['title'];?></title>
	<link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>
<!-- header start -->
<div class="header">
	<div class="header-top">
		<div class="header-top-left">
			<ul>
				<li><a href="<?php echo $userinfo['github_url'];?>">GitHub</a></li>
			</ul>
		</div>
	</div>
</div>
<!-- header end -->
<!-- main start -->
<div class="main">
	<div class="main-center">
		<div class="main-name">
			<h1>My Blog</h1>
			<span><?php echo $userinfo['signature'];?></span>
		</div>
		<div class="main-nav">
			<a href="index.php">首页</a>
            <a href="showlists.php">文章列表</a>
		</div>
		<div class="main-left">
			<div class="myinfo">
				<div class="myinfo-title">
					<span>个人资料</span>
				</div>
				<div class="myinfo-icon">
					<img src="images/myicon.png" width="65%" height="64%">
				</div>
				<div class="myinfo-name">
					<span><?php echo $userinfo['username'];?></span>
				</div>
			</div>
			<div class="blog-list">
				<div class="blog-list-title">
					<span>最新文章</span>
				</div>
				<div class="blog-list-content">
					<ul>
						<?php
						if ($bloginfo){
							for ($i=0;$i<count($bloginfo);$i++){
							echo '<li><a href="showcontent.php?bid='.$bloginfo[$i]['bid'].'">'.$bloginfo[$i]['title'].'</a></li>';
							}
						} else {
							echo '没有数据...';
						}
						?>
					</ul>
				</div>
			</div>
		</div>
		<div class="main-right">
			<div class="blog-title">
				<h1><?php echo $bowen['title'];?></h1>
			</div>
			<div class="blog-time">	
				<span>发布时间:<?php echo date("Y-m-d H:i:s",$bowen['time']);?></span>
			</div>
			<div class="blog-content">
				<?php echo $bowen['content'];?>
			</div>
		</div>
	</div>
</div>
<!-- main end -->
<div class="clear"></div>
<!-- footer start-->
<div class="footer">
	<div class="copyright">
		<span>Copyright &nbsp By &nbspzrlyou &nbsp 版权所有</span>
	</div>
</div>
<!-- footer end -->
</body>
</html>