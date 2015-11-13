<?php
//设置网站根目录
define('ROOT_PATH',dirname(__FILE__));
$str = md5(md5('123.com').'blog');
echo ROOT_PATH;
?>