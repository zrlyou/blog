<?php
/**
 * DbMysqli类，主要用于处理数据库操作
 * 	
 * Author:zrlyou(zrlyouwin@gmail.com)
 */
class DbMysqli{
	//定义数据库服务器地址
	private $dbHost;
	//定义数据库的用户名
	private $dbUsername;
	//定义数据库的用户名密码
	private $dbPassword;
	//定义数据库名
	private $dbName;
	//定义数据库服务器的端口
	private $dbPort;

	//构造方法，初始化数据库的相关信息
	public function __construct($host,$dbusername,$password,$dbname,$dbport){
		$this->dbHost     = $host;
		$this->dbUsername = $dbusername;
		$this->dbPassword = $password;
		$this->dbName     = $dbname;
		$this->dbPort     = $dbport ? intval($dbport) : 3306;
	}

	//数据库连接方法，返回数据库的一个连接
	public function connect(){
		$dblink = mysqli_connect($this->dbHost,$this->dbUsername,$this->dbPassword,$this->dbName,$this->dbPort);
		if (mysqli_connect_errno()){
			die('Connect error:'.mysqli_connect_error());
		}
		//设置字符编码为utf8
		mysqli_query($dblink,"SET NAMES utf8");
		//返回数据库连接
		return $dblink;
	}

}