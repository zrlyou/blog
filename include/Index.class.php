<?php
header('Content-Type:text/html;charset=utf-8');
include('DbMysqli.class.php');
class Index {
	//初始化数据库,返回数据库的一个对象
	public function dbConnectForIndex(){
		//加载数据库配置文件
		include ROOT_PATH.'/conf/config.php';
		//实例化数据库类对象
		$db = new DbMysqli($config['DB_HOST'],$config['DB_USER'],$config['DB_PWD'],$config['DB_NAME'],$config['DB_PORT']);
		if ($db){
			return $db;
		} else {
			echo '初始化数据库失败!';
		}
	}
	//获取用户的相关信息
	public function getUserInfoToIndex(){
		//获取数据库的一个对象
		$db       = $this->dbConnectForIndex();
		//连接数据库
		$conn     = $db->connect();
		if ($conn){				//连接成功后开始查询的操作
			//定义查询语句,获取当前登录用户的相关信息
			$sql  = "select uid,username,signature,weibo,qq_zone from user";
			$user = $db->select($conn,$sql);
			if ($user){
				//返回数组
				return $user;
			}
		} else {
			echo 'DB connect is error!';
		}
		//关闭数据库连接
		$db->close($conn);
	}
	//获取博文列表
	public function getBowenListToIndex(){
		//获取数据库的一个对象
		$db = $this->dbConnectForIndex();
		//连接数据库
		$conn = $db->connect();
		if ($conn){
			$sql = "select bid,title,time,content from blog order by time desc";
			$bloginfo = $db->selectAll($conn,$sql);
			if ($bloginfo){
				return $bloginfo;
			} else {
				return false;
			}
		} else {
			echo 'DB connect is error!';
		}
		$db->close($conn);
	}
	//获取某一篇博文
	public function getBowenToIndex($bid){
		// 获取连接数据库的一个对象
		$db   = $this->dbConnectForIndex();
		//连接数据库
		$conn = $db->connect();
		//防止SQL注入
		$bid = intval($bid);
		$bid = mysqli_real_escape_string($conn,$bid);
		if ($conn){
			$sql = "select title,time,content from blog where bid=$bid";
			$bowen = $db->select($conn,$sql);
			if ($bowen){
				return $bowen;
			} else {
				return false;
			}
		} else {
			echo 'DB connect is error!';
		}
		$db->close($conn);
	}
	public function test(){
		echo ROOT_PATH;
		include ROOT_PATH.'/conf/config.php';
		print_r($config);
	}
}
