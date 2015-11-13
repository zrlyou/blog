<?php
/**
 * User类，用于用户的验证以及修改相关信息
 * 
 * Author:zrlyou<zrlyou@gmail.com>
 */
//加载数据库操作类
include('DbMysqli.class.php');

class User {
	//用户名
	private $username;
	//密码
	private $password;
	//签名
	private $signature;
	//微博
	private $weibo;
	//QQ空间
	private $qq_zone;

	//用户身份验证
	public function userAuthentication($username,$password){
		//加载配置文件
		include('../conf/config.php');
		//实例化DbMysqli对象
		$db = new DbMysqli($config['DB_HOST'],$config['DB_USER'],$config['DB_PWD'],$config['DB_NAME'],$config['DB_PORT']);
		//连接数据库
		$conn = $db->connect();
		if ($conn){
			$sql = "select username,password,logintime,loginip from user where username='$username'";
			$user = $db->select($conn,$sql);
			if (!$user || $password!=$user['password']){
				return false;
			} else {
				return true;
			}
		}
		$db->close($conn);
	}
}
