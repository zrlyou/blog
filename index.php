<?php
//设置网站路径
define('ROOT_PATH',dirname(__FILE__));
//引入首页类
include ROOT_PATH.'/include/Index.class.php';
$index     = new Index();
@$userinfo = $index->getUserInfoToIndex();
@$bloginfo = $index->getBowenListToIndex();
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width,initial-scale=1.0" charset="UTF-8">
	<title>zrlyou的博客</title>
	<meta name="description" content="zrlyou,zrlyou的博客,我的博客,阿伦" />
	<meta name="keywords" content="zrlyou,zrlyou的博客,我的博客,个人博客,阿伦" />
	<link rel="stylesheet" type="text/css" href="css/index.css">
<!-- 	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> -->
	<!--[if lt IE 9]>
　　　<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
　<![endif]-->
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
			<a href="#">关于我</a>
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
					<span>最新博文</span>
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
				<h1><?php
					if($bloginfo){
						echo $bloginfo[0]['title'];
					} else{
						echo "没有数据...";
					}
					?></h1>
			</div>
			<div class="blog-time">	
				<span>发布时间:<?php echo date("Y-m-d H:i:s",$bloginfo[0]['time']);?></span>
			</div>
			<div class="blog-content">
				<?php
				if($bloginfo){
					echo $bloginfo[0]['content'];
				} else{
					echo "没有数据...";
				}
				?>
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