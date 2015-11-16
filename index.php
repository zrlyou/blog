<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width,initial-scale=1.0" charset="UTF-8">
	<title>我的博客</title>
	<link rel="stylesheet" type="text/css" href="css/index.css">
<!-- 	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> -->
	<!--[if lt IE 9]>
　　　<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
　<![endif]-->
</head>
<body>
<!-- header start -->
<div class="header">
	<div class="header-top">
		<div class="header-top-left">
			<ul>
				<li><a href="#">我的微博</a></li>
				<li><a href="#">我的QQ空间</a></li>
			</ul>
		</div>
	</div>
</div>
<!-- header end -->
<!-- main start -->
<div class="main">
	<div class="main-center">
		<div class="main-name">
			<h1>My Blog</h1>
			<span>程序猿欢乐多</span>
		</div>
		<div class="main-nav">
			<a href="#">首页</a>
			<a href="#">关于我</a>
		</div>
		<div class="main-left">
			<div class="myinfo">
				<div class="myinfo-title">
					<span>个人资料</span>
				</div>
				<div class="myinfo-icon">
					<img src="images/myicon.png" width="65%" height="64%">
				</div>
				<div class="myinfo-name">
					<span>阿伦</span>
				</div>
			</div>
			<div class="blog-list">
				<div class="blog-list-title">
					<span>最新博文</span>
				</div>
				<div class="blog-list-content">
					<ul>
						<li><a href="">博文一一一一</a></li>
						<li><a href="">博文二二二二</a></li>
						<li><a href="">博文三三三三</a></li>
						<li><a href="">博文四四四四</a></li>
						<li><a href="">博文五五五五</a></li>
						<li><a href="">博文六六六六</a></li>
						<li><a href="">博文七七七七</a></li>
						<li><a href="">博文八八八八</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="main-right">
			<div class="blog-title">
				<h1>Linux基本文件管理</h1>
			</div>
			<div class="blog-time">
				<span>发布时间:2015-11-10</span>
			</div>
			<div class="blog-content">
				<p>
					一：linux系统目录的构成

linux操作系统，一般都包含以下目录:

/   通常称为根分区。所有的文件和目录皆由此开始。只有root用户对此目录拥有写权限。

---/etc  配置文件  包含所有应用程序的配置文件，也包含启动、关闭某个特定程序的脚本，例如，

/etc/passwd，/etc/init.d/network等。

---/boot存放Linux系统启动时需要加载的文件。 (一般在另外一个磁盘分区里面保存) Kernel、grub等文件都存放在此。

---/home  普通用户所有数据存放在这个目录下 

---/var  是一个可增长的目录，包含很经常变的文件。例如，/var/log（系统日志）、/var/lib （包文件） 、

---/root  管理员所有数据。  root用户的家目录

---/tmp  临时文件存储位置

---/usr  usr表示的是unix software source    

---/bin  命令  此目录包含二进制可执行文件。

---/sbin  系统命令 ，此目录中的命令主要供系统管理员使用，以进行系统维护。例如，iptables、reboot、fdisk等。

/mnt- 挂载目录  挂载点，系统管理员可用于临时挂载文件系统。     /media

---/dev  包含设备文件。在Linux中，一切都被看做文件。终端设备、USB、磁盘等等都被看做文件，如/dev/sda。

 

二、绝对/相对路径的概念

在日常的文件管理中，经常会用到绝对路径和相对路径，那么什么是绝对路径和相对路径呢？

绝对路径：我们知道linux系统中，所有的文件和目录都是以/目录开始，简单的讲，绝对路径就是由根目录开始，一步一步的写到实际文件存放的位置，例如：我需要访问passwd文件，绝对路径的写法就是/etc/passwd。

相对路径：不是由根开始，一步一步的写到实际文件存放的位置，而是由现在所处目录开始到目标目录的写法。例如：现在所处目录为/boot，目标目录为/boot/grub/，绝对路径的写法为cd /boot/grub/，而相对路径可以这些写cd grub/

 

文件、目录操作命令

在介绍操作命令之前，我们需要了解几个特殊的目录

.      代表本层目录

..      代表上层目录

代表上一次工作的目录

~      代表目前用户的家目录

这些特殊目录配合相对路径使用，极大的提高了目录切换的速度

以上目录可以通过cd命令切换

例如：

切换至上层目录  cd ..

切换至上一次工作的目录 cd –

切换至家目录 cd ~ 或者直接cd

 

文件和文件夹常用操作命令

 

touch　

作用：创建空文件

语法： touch 文件名

例：

[root@xuegod163~]# touch dajuan  ###创建一个名字为dajuan的空文件

 

mkdir

作用：创建目录

语法：mkdir 目录名 （加上-p参数可以递归创建）

例如：

[root@xuegod163~]# mkdir harley    ###创建名字为harley的文件夹

[root@xuegod163~]# mkdir -p  harley/xunbin/ylyq  ###在harley文件夹下创建xunbin文件夹，然后在xunbin文件夹下再创建ylyp的文件夹

 

cat

作用：查看文件内容

语法：cat 文件名

例：

[root@xuegod163~]# cat /etc/passwd  ###查看passwd文件内容，直接全部打印到终端

 

more　

作用：分页查看文件内容（一般用于查看文件内容比较多的文件）

语法：more 文件名

使用方法: 按下回车刷新一行，按下空格刷新一屏  按q　退出 （不可向上翻页）

less

作用：分页查看文件内容（一般用于查看文件内容比较多的文件）
语法：less 文件名
使用方法：使用光标键可以向上翻页


linux中more与less的区别
more:不支持后退，但几乎不需要加参数，空格键是向下翻页，Enter键是向下翻一行，在不需要后退的情况下比较方便。
less：支持前后翻滚，既可以向上翻页（pageup按键），也可以向下翻页（pagedown按键）。，空格键是向下翻页，Enter键是向下翻一行

				</p>
			</div>
		</div>
	</div>
</div>
<!-- main end -->
<div class="clear"></div>
<!-- footer start-->
<div class="footer">
	<div class="copyright">
		<span>Copyright &nbsp By &nbspzrlyou &nbsp 版权所有</span>
	</div>
</div>
<!-- footer end -->
</body>
</html>