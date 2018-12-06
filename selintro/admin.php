<html>
<head>	
	<link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.css" type="text/css">
	<link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css" type="text/css">
	<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
	<script src="bootstrap-3.3.7-dist/js/bootstrap.js"></script>
	<script src="bootstrap-3.3.7-dist/js/jquery-3.3.1.min.js"></script></head>
<body>
<?php 
/* 
 * 数据库操作*（创建数据库，表，插入数据，插入多条数据） 
 * 
 * To change the template for this generated file go to 
 * Window - Preferences - PHPeclipse - PHP - Code Templates 
 */ 
//先连接数据库
$servername="localhost";  
$username="root";
$userpassword="123";
$dbname = "test";
  
$connent=new mysqli($servername,$username,$userpassword,$dbname);  

//创建数据库  
$createdatabase="create database test";  
$connent->query($createdatabase); 
//创建表  原生的建表语句 id自增唯一  name age email  
$createtable="create table user(ID int(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,Name varchar(20) BINARY,Password varchar(20) BINARY, Username varchar(20), UserYear varchar(10), UserMonth varchar(10), UserDay varchar(10), UserAdress varchar(50), UserExper varchar(200), UserFuture varchar(200), URL varchar(300))";
$connent->query($createtable); 
//输出数据  

$selectdata="select * from user"; 
$result = mysqli_query($connent,$selectdata);


$index = 0;
echo"<br><br><br><br>";
echo"<form action='insert.php' method='post'>
		<input type='text' name='name' placeholder='Username' required='required' />
		<input type='password' name='password' placeholder='Password' required='required' />
		<button type='submit' >add user</button>
	</form>";
echo"<br><br>";
echo "<table></tr><tr><td width=50>序号</td><td width=50>姓名</td><td width=50>删除</td><td>密码更新</td></tr><tr><td colspan=4 height=50></tr>";
while($row = mysqli_fetch_array($result)){
	if($row['Name'] != 'admin'){
		$index++;
		$name = $row['Name'];
		$psw = $row['Password'];
		echo "<tr><td>".$index."</td><td>".$name."</td><td><form method='post' action='deleteUser.php'>
		<input type='hidden' name='name' value = '$name'>
		<input type='submit' value='delete'>
		</form></td>
		<td><form method='post' action='updateUser.php'>
		<input type='hidden' name='name' value = '$name'>
		<input type='password' name='password' placeholder='new_Password' required='required'>
		<input type='submit' value='update'>
		</form></td></tr>";
	}
}
echo "</table>";

mysqli_close($connent);
?>
</body>
</html>