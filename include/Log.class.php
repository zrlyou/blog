<?php
/**
 *
 *Log 类，用于记录后台用户登录的相关信息
 *
 *
 * Author:zrlyou<zrlyouwin@gmail.com>
 * 
 */
include_once('../conf/config.php');
//加载数据库类
include_once('DbMysqli.class.php');
include_once('Pages.class.php');

class Log {

	//初始化数据库的相关信息 返回数据库的一个对象
	private function dbConnectForLog(){
		//实例化数据库类
		$db = new DbMysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);
		if (!$db){
			die('数据库初始化失败!');
		}
		return $db;
	}

	//recordLogForLogin方法，用于记录用户的登录行为
	public function recordLogForLogin($username,$loginip,$logintime,$status){
		//获取数据库的一个对象
		$db = $this->dbConnectForLog();
		//连接数据库
		$conn = $db->connect();

		if ($conn){					//数据库连接成功，则进行记录操作
			//定义记录登录信息的SQL语句
			$sql = "INSERT INTO log(username,loginip,logintime,status) VALUES('$username','$loginip',$logintime,$status)";
			//执行记录的操作
			if ($db->query($conn,$sql)){
				return true;
			} else {
				return false;
			}
		}
		$db->close($conn);
	}
	//showLogToAdmin方法，用于后台首页显示登录的相关信息 
	public function showLogToAdmin($page){
        $pages = new Pages();
		$limit = ($page - 1) * $pages->offset;
		//获取数据库的一个对象
		$db = $this->dbConnectForLog();
		//连接数据库
		$conn = $db->connect();

		if ($conn){			//数据库连接成功，开始读取数据
			//按照时间顺序倒序读取数据
			$sql = "SELECT lid,username,loginip,logintime,status FROM log ORDER BY logintime DESC LIMIT ".$limit.','.$pages->offset;
			$result = $db->selectAll($conn,$sql);
			if ($result){
				return $result;
			} else {
				exit('No data!');
			}
		}
		$db->close($conn);
	}	
}