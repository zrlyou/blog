<?php
/**
 * User类，用于用户的验证以及修改相关信息
 * 
 * Author:zrlyou<zrlyouwin@gmail.com>
 */
//加载数据库操作类
include('DbMysqli.class.php');

class User {
	//初始化数据库类
	private function dbConnectForUser(){
		//加载配置文件
		include('../conf/config.php');
		//实例化DbMysqli对象
		$db   = new DbMysqli($config['DB_HOST'],$config['DB_USER'],$config['DB_PWD'],$config['DB_NAME'],$config['DB_PORT']);
		return $db;
	}
	//记录登陆时间和ip
	public function recordLogintimeAndLoginip($db,$conn,$username,$time){
		//获取当前用户登录时的ip
		$loginip   = $_SERVER['REMOTE_ADDR'];
		//定义SQL更新语句，用于更新user表的logintime和loginip两个字段
		$sql       = "UPDATE user SET logintime=$time,loginip='$loginip' WHERE username='$username'";
		//执行SQL语句
		$db->query($conn,$sql);
	}

	//用户身份验证
	public function userAuthentication($username,$password){
		//获取数据库的一个对象
		$db   = $this->dbConnectForUser();
		//连接数据库
		$conn = $db->connect();
		if ($conn){
			//定义SQL查询语句，获取user表里的用户
			$sql  = "SELECT username,password,logintime,loginip FROM user WHERE username='$username'";
			$user = $db->select($conn,$sql);
			if (!$user || $password!=$user['password']){
				return false;
			} else {
				//获取当前登录时间
				$time =time();
				@session_start();
				//设置上次登陆时间
				$_SESSION['last_logintime'] = $user['logintime']>0 ? date("Y-m-d H:i:s",$user['logintime']) : date("Y-m-d H:i:s",$time);
				//设置上次登陆ip
				$_SESSION['last_loginip']   = $user['loginip']!='0' ? $_SERVER['REMOTE_ADDR'] : $user['loginip'];
				//执行记录登录时间以及ip的方法
				$this->recordLogintimeAndLoginip($db,$conn,$user['username'],$time);
				return true;
			}
		}
		//关闭数据库连接
		$db->close($conn);
	}
	//获取用户相关信息,返回一个关联数组
	public function getUserInfo(){
		$db       = $this->dbConnectForUser();
			//获取当前登录用户名
		@$username = $_SESSION['username'];
		//连接数据库
		$conn     = $db->connect();
		if ($conn){				//连接成功后开始查询的操作
			//定义查询语句,获取当前登录用户的相关信息
			$sql  = "SELECT uid,username,signature,weibo,github_url FROM user WHERE username='$username'";
			$user = $db->select($conn,$sql);
			if ($user){
				//返回数组
				return $user;
			}
		}
		//关闭数据库连接
		$db->close($conn);
	}
	//保存用户的修改信息
	public function saveChangeForUser($uid,$username,$signature,$weibo,$qq_zone){
		//获取数据库的一个对象
		$db = $this->dbConnectForUser();
		//连接数据库
		$conn = $db->connect();
		if ($conn){				//连接成功后开始更新数据的操作
			//定义SQL语句，用于更新用户的相关信息
			$sql = "UPDATE user SET username='$username',signature='$signature',weibo='$weibo',github_url='$qq_zone' WHERE uid=$uid";
			if ($db->query($conn,$sql)){
				//成功返回true
				return true;
			} else {
				//失败返回false
				return false;
			}
		}
		//关闭数据库连接
		$db->close($conn);
	}

	//保存用户修改的密码
	public function savePwdForUser($username,$oldpwd,$newpwd){
		//获取数据库的一个对象
		$db = $this->dbConnectForUser();
		//连接数据库
		$conn = $db->connect();

		if ($conn){				//连接成功后开始数据库操作
			//定义SQL语句，获取用户当前使用的密码
			$sql = "SELECT password FROM user WHERE username='$username'";
			$user = $db->select($conn,$sql);
			if (!$user || $user['password']!=$oldpwd){
				return "<script>alert('旧密码输入错误！请重新输入!');history.back();</script>";
			} else {
				//旧密码与数据库中的一样，则进行新密码的更新操作
				//定义SQl语句，用于更新新密码
				$sql = "UPDATE user SET password='$newpwd' WHERE username='$username'";
				if ($db->query($conn,$sql)){
					return "<script>alert('修改成功!');history.back();</script>";
				} else {
					return "<script>alert('修改失败！请重新输入!');history.back();</script>";
				}
			}
		}
		$db->close($conn);
	}
}
