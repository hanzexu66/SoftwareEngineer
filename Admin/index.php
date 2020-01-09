<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>后台管理系统</title>
</head>
<style type="text/css">
.wrapper {width: 1000px;margin: 20px auto;}
h2 {text-align: center;}
.add {margin-bottom: 20px;}
.add a {text-decoration: none;color: #fff;background-color: green;padding: 6px;border-radius: 5px;}
td {text-align: center;}
</style>
<script type="text/javascript">
function altRows(id){
	if(document.getElementsByTagName){  
		
		var table = document.getElementById(id);  
		var rows = table.getElementsByTagName("tr"); 
		 
		for(i = 0; i < rows.length; i++){          
			if(i % 2 == 0){
				rows[i].className = "evenrowcolor";
			}else{
				rows[i].className = "oddrowcolor";
			}      
		}
	}
}
 
window.οnlοad=function(){
	altRows('alternatecolor');
}
</script>
 
 
<!-- CSS goes in the document HEAD or added to your external stylesheet -->
<style type="text/css">
table.altrowstable {
	font-family: verdana,arial,sans-serif;
	font-size:11px;
	color:#333333;
	border-width: 1px;
	border-color: #a9c6c9;
	border-collapse: collapse;
}
table.altrowstable th {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #a9c6c9;
}
table.altrowstable td {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #a9c6c9;
}
.oddrowcolor{
	background-color:#d4e3e5;
}
.evenrowcolor{
	background-color:#c3dde0;
}
</style>


<body>
	<div class="wrapper">
		<h2>后台管理系统</h2>
		<table class="altrowstable" id="alternatecolor">
			<tr>
				<th>ID</th>
				<th>名称</th>
				<th>类型</th>
				<th>找到时间</th>
				<th>经度</th>
				<th>纬度</th>
				<th>问题</th>
				<th>答案</th>
				<th>电话号码</th>
			</tr>

			<?php
				// 1.导入配置文件
				require "dbconfig.php";

				// 2. 连接mysql
				$link = @mysql_connect(HOST,USER,PASS) or die("提示：数据库连接失败！");
				// 选择数据库
				mysql_select_db(DBNAME,$link);
				// 编码设置
				mysql_set_charset('utf8',$link);

				// 3. 从DBNAME中查询到baby数据库，返回数据库结果集,并按照addtime降序排列
				$sql = 'select * from baby order by BabyUpdateTime asc';
				// 结果集
				$result = mysql_query($sql,$link);
				// var_dump($result);die;

				// 解析结果集,$row为新闻所有数据，$babyNum为新闻数目
				$babyNum=mysql_num_rows($result);

				for($i=0; $i<$babyNum; $i++){
					$row = mysql_fetch_assoc($result);
					echo "<tr>";
					echo "<td>{$row['BabyId']}</td>";
					echo "<td>{$row['BabyName']}</td>";
					echo "<td>{$row['BabyClass']}</td>";
					echo "<td>{$row['BabyFindTime']}</td>";
					echo "<td>{$row['BabyLong']}</td>";
					echo "<td>{$row['BabyLat']}</td>";
					echo "<td>{$row['BabyPassSecret']}</td>";
					echo "<td>{$row['BabySecretKey']}</td>";
					echo "<td>{$row['BabyFindPhone']}</td>";
					echo "<td>
							<a href='javascript:del({$row['BabyId']})'>删除</a>
							<a href='editnews.php?id={$row['BabyId']}'>修改</a>
						  </td>";
					echo "</tr>";
				}
				// 5. 释放结果集
				mysql_free_result($result);
				mysql_close($link);
			?>

		</table>
	</div>

	<script type="text/javascript">
		function del (id) {
			if (confirm("确定删除这条信息吗？")){
				window.location = "action-del.php?id="+id;
			}
		}
	</script>
</body>
</html>
