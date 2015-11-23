<?php
/**
 *
 *Log 类，用于记录后台用户登录的相关信息
 *
 *
 * Author:zrlyou<zrlyouwin@gmail.com>
 * 
 */
//加载数据库类
include('../include/DbMysqli.class.php');

class Blog {
	//登录的用户
	private $username;
	//登录的ip
	private $loginip;
	//登录的时间
	private $logintime;
	//登录的状态
	private $status;

	//构造方法，用于初始化登录的相关信息
	public function __construct($username,$loginip,$logintime,$status){
		$this->username  = $username;
		$this->loginip   = $loginip;
		$this->logintime = $logintime;
		$this->status    = $status;
	}

	//初始化数据库的相关信息 返回数据库的一个对象
	private function dbConnectForLog(){
		//引入数据库的配置文件
		include('../conf/config.php');
		//实例化数据库类
		$db = new DbMysqli($config['DB_HOST'],$config['DB_USER'],$config['DB_PWD'],$config['DB_NAME'],$config['DB_PORT']);

		if (!$db){
			die('数据库初始化失败!');
		}
		return $db;
	}

	//recordLogForLogin方法，用于记录用户的登录行为
	public function recordLogForLogin(){
		//获取数据库的一个对象
		$db = $this->dbConnectForLog();
		//连接数据库
		$conn = $db->connect();

		if ($conn){					//数据库连接成功，则进行记录操作
			//定义记录登录信息的SQL语句
			$sql = "insert into log(username,loginip,logintime,status) values('$this->username','$this->loginip',$this->logintime,$this->status)";
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
	public function showLogToAdmin(){
		//获取数据库的一个对象
		$db = $this->dbConnectForLog();
		//连接数据库
		$conn = $db->connect();

		if ($conn){			//数据库连接成功，开始读取数据
			//按照时间顺序倒序读取数据
			$sql = "select lid,username,loginip,logintime,status from log order by time desc";
			$result = $db->selectAll($conn,$sql);
			if ($result){
				return $return;
			} else {
				exit('No data!');
			}
		}
		$db->close($conn);
	}	
}