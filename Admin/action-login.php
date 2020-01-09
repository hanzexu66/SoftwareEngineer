<?php
// 处理编辑操作的页面
require "dbconfig.php";
// 连接mysql
$link = @mysql_connect(HOST,USER,PASS) or die("提示：数据库连接失败！");
// 选择数据库
mysql_select_db(DBNAME,$link);
// 编码设置
mysql_set_charset('utf8',$link);

// 获取修改的新闻
$name = $_POST['name'];
$password = $_POST['password'];
// 更新数据
$sql = "select count(*) from login where Name=$name and Password=$password";
$result = mysql_query($sql,$link);
header("Location:index.php");


