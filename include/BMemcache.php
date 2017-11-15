<?php
/**
 * Author       : zrlyou<zrlyouwin@gmail.com>
 * CreateTime   : 2017/11/14 14:48
 * FileName     : BMemcache.php
 * Description  : Memcache处理类
 */
class BMemcache
{
    //memcache地址
    private $mcHost;
    //memcache端口
    private $mcPort;

    //BMemcache构造函数
    public function __construct($host, $port){
        $this->mcHost = $host;
        $this->mcPort = $port;
    }
   //连接memcache服务器
    public function connectToMcServer(){
        $mcObj = new Memcache();
        $mcObj->connect($this->mcHost, $this->mcPort) or die("Could not connect mc server!");
        return $mcObj;
    }
    
    //存数据
    public function setValue($key, $value){
        $mc = $this->connectToMcServer();
        $mc->set($key, $value,MEMCACHE_COMPRESSED, 300);
    }
    
    //读数据
    public function getValue($key){
        $mc = $this->connectToMcServer();
        return $mc->get($key);
    }
    
    //close
    public function closeMcServer(){
        $mc = $this->connectToMcServer();
        $mc->close();
    }
}