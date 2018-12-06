<?php 
header("refresh:2;url=admin.php");
print('正在加载，请稍等...<br>五秒后自动跳转。');
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
//插入数据  
$name=$_POST["name"]; //从表单获得
$psw=$_POST["password"]; //从表单获得
$insertdata="insert into user(Name,Password) values('".$name."','".$psw."')";
$selectdata="select * from user where Name='$name'";
$res_query = mysqli_query($connent, $selectdata);
$row = mysqli_fetch_assoc($res_query);
if($res_query==true && $row['Name']==$name){
	echo "用户已存在";
}
else{
	$result = $connent->query($insertdata);
	if($result==true){
		echo "插入数据成功"; 
		header("refresh:5;url=admin.php");
		print('正在加载，请稍等...<br>五秒后自动跳转。');
	}else{
		echo "Error insert data: " . $connent->error; 
	}
}
//也可以如下这么写 也比较简单一些  
/*if (mysqli_query($connent, $insertdata)) { 
    echo "插入数据成功"; 
} else { 
    echo "Error insert data: " . $connent->error; 
}*/  
//插入多条数据  
/*$insertdatas="insert into zh(name,age,email) values('test1',1,'1.com');"; 
$insertdatas .="insert into zh(name,age,email) values('tes2',2,'2.com');"; 
$insertdatas .="insert into zh(name,age,email) values('test3',3,'3.com')"; 
if ($connent->multi_query($insertdatas)==true) { 
    echo "插入多条数据成功"; 
} else { 
    echo "Error insert datas: " . $connent->error; 
}*/  
//关闭数据库  
mysqli_close($connent);
?>