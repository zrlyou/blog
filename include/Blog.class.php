<?php
/**
 *Blog类 ，用于对博文的操作
 *
 *
 * Author:zrlyouwin@gmail.com
 * 
 */
//加载数据库操作类
include('../include/DbMysqli.class.php');

class Blog {
	//初始化数据库,返回数据库的一个对象
	private function dbConnectForBolg(){
		//加载数据库配置文件
		include('../conf/config.php');
		//实例化数据库类对象
		$db = new DbMysqli($config['DB_HOST'],$config['DB_USER'],$config['DB_PWD'],$config['DB_NAME'],$config['DB_PORT']);
		return $db;
	}
	//添加博文
	public function addBowenForBlog($title,$time,$content){
		//获取连接数据库的有一个对象
		$db = $this->dbConnectForBolg();
		//连接数据库
		$conn = $db->connect();

		if ($conn){				//数据库连接成功后，开始进行插入数据操作
			//定义SQL数据插入语句
			$sql = "insert into blog(title,time,content) values('$title',$time,'$content')"; 
			if ($db->query($conn,$sql)){
				return "<script>alert('添加成功!');location.href='b_addbowen.php'</script>";
			} else {
				return "<script>alert('添加失败!');history.back();</script>";
			}
		}
		//关掉数据库连接
		$db->close($conn);
	}
	//显示博文列表
	public function showListForBlog(){
		//获取连接数据库的一个对象
		$db = $this->dbConnectForBolg();
		//连接数据库
		$conn = $db->connect();
		//连接成功后，开始查询操作
		if ($conn) {
			$sql = "select * from blog";
			$blogs = $db->selectAll($conn,$sql);
			if ($blogs){
				return $blogs;
			}
		}
		$db->close($conn);
	}
}

