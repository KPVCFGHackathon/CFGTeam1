<?php
$conn=new mysqli("localhost","root","","loginregister");
if($conn->connect_error)
 {
 	 die("Connection failed". $conn->connect_error);

 }
 else
 	echo "Connection successful";
if((isset($_POST['register-submit'])))
{
  $username=$_POST['username'];
  $password=$_POST['password'];
  //echo"username :$username";
  $sql="INSERT into userstable (username,password)values('$username','$password')";
  $conn->query($sql);
  //"INSERT INTO users_db (email,name,mobile,password,role,ld) VALUES ('$email','$name','$phone','$password','$role','$ld')";
  echo" \nregistration successful";

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<h1><p align="center" style="color:#FCFBFA  ;">REGISTRATION FORM</p></h1>
</head>
<body background = "blue.jpg">
<form method="post">
<br><br><br><br><br>
  <h3><p align="center" style="color:#FCFBFA  ;">Username &nbsp&nbsp&nbsp&nbsp<input type="text" name="username"></p></h3>
  <h3><p align="center" style="color:#FCFBFA  ;">Password &nbsp&nbsp&nbsp&nbsp<input type="text" name="password"></p></h3>
  <p align="center"><input type="submit" name="register-submit" value="Register"></p>
  <p align="center"><a href="loginform.php">log in?</a></p>

</from>

</body>
