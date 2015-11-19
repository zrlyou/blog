<?php
session_start();
header('Content-Type:text/html;charset=utf-8');
if (!isset($_SESSION['username'])) header('Location:b_login.php');
@$bid = trim($_GET['bid']);
if (!$bid) {
	echo "<script>alert('参数错误!');history.back();</script>";
} else{
	include('../include/Blog.class.php');
	$blog = new Blog();
	if ($blog->deleteBowenForBlog($bid)){
		echo "<script>alert('删除成功!');location.href='b_bowenlist.php';</script>";
	} else {
		echo "<script>alert('删除失败!');history.back();</script>";
	}
}
?>