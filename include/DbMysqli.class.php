<?php
/**
 * DbMysqli类，主要用于处理数据库操作
 * 	
 * Author:zrlyou(zrlyouwin@gmail.com)
 */
class DbMysqli {
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
		$dblink = new mysqli($this->dbHost,$this->dbUsername,$this->dbPassword,$this->dbName,$this->dbPort);
		if ($dblink->connect_error || !$dblink){
			die("Connection failed: " . $dblink->connect_error);
		}
		//设置字符编码为utf8
		$dblink->set_charset('utf8');
		//返回数据库连接
		return $dblink;
	}
	//select方法，查询一行数据，返回值为一个关联数组
	public function select($link,$sql){
		$result = $link->query($sql);
		if ($result->num_rows<0) {
			echo 'The record does not exist!';
		} else {
			$rows = $result->fetch_assoc();
		}
		$result->close();		//释放结果内存
		return $rows;
	}
	//selectAll方法，查询所有数据，返回一个关联数组
	public function selectAll($link,$sql){
		$result = $link->query($sql);
		$rows   = array();
		if ($result->num_rows<0){
			echo 'The record does not exist!';
		} else {
			for ($i=0;$i<$result->num_rows;$i++){
				$rows[$i] = $result->fetch_assoc();
			}	
		}
		$result->close();		//释放结果内存
		return $rows;
	}
	//query方法，用于执行insert、update、delete语句，返回值为布尔值
	public function query($link,$sql){
		if ($link->query($sql) === true){
			return true;
		} else {
			return false;
		}
	}
	//关闭数据库连接
	public function close($link){
		$link->close();
	}
}