<?php
/**
 * Author       : zrlyouwin@gmail.com
 * CreateTime   : 2017/3/10 11:45
 * FileName     : Pages.class.php
 * Description  : 处理分页
 */
class Pages {
    var $offset;
    public function __construct()
    {
        $this->offset = 5;
    }
    //初始化数据库
    private function dbConnectForPages()
    {
       //加载db配置文件
        include('../conf/config.php');
        //实例化数据库类对象
        $db = new mysqli($config['DB_HOST'], $config['DB_USER'], $config['DB_PWD'], $config['DB_NAME'], $config['DB_PORT']);
        if($db->connect_error) {
           die("Connect to DB server failed: ".$db->connect_error);
        } else {
            return $db;
        }
    }

    //获取当前表的所有记录行
    public function getAllCountFromTable($table_name)
    {
        $sql ="SELECT * FROM $table_name";
        //连接数据库
        $db_conn = $this->dbConnectForPages();
        $result  = $db_conn->query($sql);
        if($result->num_rows > 0) {
            return $result->num_rows;
        } else {
            return false;
        }
    }
    //获取所有页数
    public function getPages($tableName){
        $record_counts = $this->getAllCountFromTable($tableName);
        if($record_counts) {
            $pages = $record_counts / $this->offset;
            if($pages == 0){
                $pages = 1;
            }
            return $pages;
        } else {
            return false;
        }
    }
}
