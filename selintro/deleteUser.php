
<?php 
header("refresh:2;url=admin.php");
print('正在加载，请稍等...<br>两秒后自动跳转。');
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
  
$connent=mysqli_connect($servername,$username,$userpassword,$dbname);  
if($connent->connect_error){  
    die("连接失败: " . $connent->connect_error);  
}else{  
    echo "连接成功";
}
//创建数据库  
$createdatabase="create database test";  
if($connent->query($createdatabase)==true){  
    echo "创建数据库成功";  
}else{  
    echo "Error creating database: " . $connent->error."<br>";  
}  
//创建表  原生的建表语句 id自增唯一  name age email  
$createtable="create table user(ID int(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,Name varchar(20) BINARY,Password varchar(20) BINARY, Username varchar(20), UserYear varchar(10), UserMonth varchar(10), UserDay varchar(10), UserAdress varchar(50), UserExper varchar(200), UserFuture varchar(200), URL varchar(300))";
if($connent->query($createtable)==true){//执行
    echo "创建表zh成功";
}else{  
    echo "Error creating table: " . $connent->error."<br>";  
}
//输出数据  

$name = $_POST['name'];

$selectdata="delete from user where Name='{$name}'";
$result = mysqli_query($connent,$selectdata);

mysqli_close($connent);
?>