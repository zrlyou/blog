<?php
include 'include/Index.class.php';
$index = new Index();
$userinfo = $index->getUserInfoToIndex();
$bloginfo = $index->getLatestList();
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width,initial-scale=1.0" charset="UTF-8">
	<title>文章列表</title>
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
							for ($i=0; $i<count($bloginfo); $i++){
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
			<div class="list-title">
				<h1>文章列表</h1>
			</div>
			<div class="list-content">
                <ul>
                    <?php
                        if(!isset($_GET['page']) || empty($_GET['page'])) {
                            $page = 1;
                        } else {
                            $page = intval($_GET['page']);
                        }
                        $lists = $index->getBowenList($page);
                        if ($lists){
                            for($j=0; $j<count($lists); $j++){
                                echo '<li><a href="showcontent.php?bid='.$lists[$j]['bid'].'">'.$lists[$j]['title'].'</a><span class="pub_date">'.date('Y-m-d', $lists[$j]['time']).'</span></li>';
                            }
                        }
                        else {
                            echo '<li>没有数据...</li>';
                        }
                    ?>
                </ul>
			</div>
            <div class="pages">
                <ul class="pagination">
                    <?php
                        $pages = new Pages();
                        $all_pages = $pages->getPages('blog');
                        for($i=0;$i<$all_pages;$i++)
                        {
                            $p = $i + 1;
                            echo '<li><a href="showlists.php?page='.$p.'">'.$p.'</a></li>';
                        }
                    ?>
                </ul>
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