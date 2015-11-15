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

	//记录登陆时间和ip
	public function recordLogintimeAndLoginip($db,$conn){
		$logintime = time();
		$loginip   = $_SERVER['REMOTE_ADDR'];
		$sql       = "insert into user(logintime,loginip) values('$logintime','$loginip')";
		$db->query($conn,$sql);
	}

	//用户身份验证
	public function userAuthentication($username,$password){
		//加载配置文件
		include('../conf/config.php');
		//实例化DbMysqli对象
		$db   = new DbMysqli($config['DB_HOST'],$config['DB_USER'],$config['DB_PWD'],$config['DB_NAME'],$config['DB_PORT']);
		//连接数据库
		$conn = $db->connect();
		if ($conn){
			$sql  = "select username,password,logintime,loginip from user where username='$username'";
			$user = $db->select($conn,$sql);
			if (!$user || $password!=$user['password']){
				return false;
			} else {
				@session_start();
				//设置上次登陆时间
				$_SESSION['last_logintime'] = $user['logintime']>0 ? date("Y-m-d H:i:s",$user['logintime']) : date("Y-m-d H:i:s",time());
				//设置上次登陆ip
				$_SESSION['last_loginip']   = $user['loginip']!=$_SERVER['REMOTE_ADDR'] ? $_SERVER['REMOTE_ADDR'] : $user['loginip'];

				$this->recordLogintimeAndLoginip($db,$conn);
				return true;
			}
		}
		$db->close($conn);
	}
}
