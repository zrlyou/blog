<?php
include_once('./conf/config.php');
include('DbMysqli.class.php');
include('Pages.class.php');

class Index {
	//初始化数据库,返回数据库的一个对象
	public function dbConnectForIndex(){
		//实例化数据库类对象
		$db = new DbMysqli(DB_HOST, DB_USER , DB_PASS, DB_NAME, DB_PORT);
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
			$sql  = "SELECT uid,username,signature,weibo,github_url FROM user";
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

    //获取最新五条博文
    public function getLatestList(){
        $db = $this->dbConnectForIndex();
        $conn = $db->connect();

        if($conn){
            $sql = "SELECT bid,title,time,content FROM blog ORDER BY time DESC LIMIT 5";
            $bloglatestlist = $db->selectAll($conn, $sql);
            if($bloglatestlist){
                return $bloglatestlist;
            } else {
                echo "没有数据...";
            }
        }
        $db->close($conn);
    }
	//获取博文列表
	public function getBowenList($page){
		//获取数据库的一个对象
		$db = $this->dbConnectForIndex();
		//连接数据库
		$conn = $db->connect();
		if ($conn){
            $pages = new Pages();
            $limit = ($page - 1) * $pages->offset;
            $sql = "SELECT bid, title, time FROM blog ORDER BY time DESC LIMIT ".$limit.','.$pages->offset;
			$bloglist = $db->selectAll($conn,$sql);
			if ($bloglist){
                return $bloglist;
			} else {
				echo '没有数据...';
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
			$sql = "SELECT title,time,content FROM blog WHERE bid=$bid";
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
}
