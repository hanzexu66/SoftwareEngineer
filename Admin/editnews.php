<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>修改宝贝</title>
<style type="text/css">
.wrapper {width: 1000px;margin: 20px auto;}
h2 {text-align: center;}
.add {margin-bottom: 20px;}
.add a {text-decoration: none;color: #fff;background-color: green;padding: 6px;border-radius: 5px;}
td {text-align: center;}
</style>
</head>
<body>
<?php
    require "dbconfig.php";

    $link = @mysql_connect(HOST,USER,PASS) or die("提示：数据库连接失败！");
    mysql_select_db(DBNAME,$link);
    mysql_set_charset('utf8',$link);
    
    $id = $_GET['id'];
    $sql = mysql_query("SELECT * FROM baby WHERE BabyId=$id",$link);
    $sql_arr = mysql_fetch_assoc($sql); 

?>
<form action="action-editnews.php" method="post">
    <label>宝贝ID: </label><input type="text" name="id" value="<?php echo $sql_arr['BabyId']?>"><br /><br />
    <label>名称：</label><input type="text" name="name" value="<?php echo $sql_arr['BabyName']?>"><br /><br />
    <label>类型：</label><input type="text" name="class" value="<?php echo $sql_arr['BabyClass']?>"><br /><br />
    <label>问题：</label><input type="text" name="passSecret" value="<?php echo $sql_arr['BabyPassSecret']?>"><br /><br />
    <label>答案：</label><input type="text" name="SecretKey" value="<?php echo $sql_arr['BabySecretKey']?>"><br /><br />
    <label>电话号码：</label><input type="text" name="phone" value="<?php echo $sql_arr['BabyFindPhone']?>"><br /><br />
    <input type="submit" value="提交">
</form>

</body>
</html>
