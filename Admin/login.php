<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>登录</title>
</head>
<body>
<?php
    require "dbconfig.php";

    $link = @mysql_connect(HOST,USER,PASS) or die("提示：数据库连接失败！");
    mysql_select_db(DBNAME,$link);
    mysql_set_charset('utf8',$link);

?>
<form action="action-login.php" method="post">
    <label>用户名: </label><input type="text" name="name" >
    <label>密码：</label><input type="text" name="password" >
    <input type="submit" value="提交">
</form>

</body>
</html>

