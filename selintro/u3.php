
<?php 
header("refresh:2;url=3.php");
print('正在加载，请稍等...<br>五秒后自动跳转。');
session_start();
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

$SESSION = $_SESSION['views'];
$name = $_POST['name'];
$selectdata="update user set UserFuture='$name' where Name='$SESSION'";
$result = mysqli_query($connent,$selectdata);

mysqli_close($connent);
?>