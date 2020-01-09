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
$id = $_POST['id'];
$name = $_POST['name'];
$class = $_POST['class'];
$passSecret = $_POST['passSecret'];
$SecretKey = $_POST['SecretKey'];
$phone = $_POST['phone'];
// 更新数据
mysql_query("UPDATE baby SET BabyName='$name',BabyClass='$class',BabyPassSecret='$passSecret',BabySecretKey='$SecretKey',BabyFindPhone='$phone' WHERE BabyId=$id",$link) or die('修改数据出错：'.mysql_error());
header("Location:index.php");  

