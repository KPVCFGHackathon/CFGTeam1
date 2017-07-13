<?php
$conn=new mysqli("localhost","root","","loginregister");
if($conn->connect_error)
 {
 	 die("Connection failed". $conn->connect_error);

 }
 else
 	echo "Connection successful";
  session_start();
if(isset($_POST['login-submit']))
{  
	$username=$_POST['username'];
	$password=$_POST['password'];
	$sql="SELECT * from userstable where username='$username' and password='$password'";
	$result=$conn->query($sql);
	if($result->num_rows>0)
	{
		echo"<br> Login successful";
		$_SESSION['loggeduser']=$username;
		$_SESSION['enteredpassword']=$password;
		header('location:privateuser.php');

	}
	else
		echo"<br> Login failed";

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<h1><p align="center" style="color:#FCFBFA  ;">  LOGIN FORM </p></h1>
</head>
<body background = "blue.jpg">
<br><br><br><br><br>


  <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
  <h3><p align="center" style="color:#FCFBFA  ;">Username &nbsp&nbsp&nbsp&nbsp<input type="text" name="username"></p></h3>
  <h3><p align="center" style="color:#FCFBFA;">Password &nbsp&nbsp&nbsp&nbsp<input type="password" name="password"></p></h3>
<p align="center"><input type="submit" name="login-submit" value="Login"></p>
<p align="center" style="color:#FCFBFA  ;"><a href="register.php">New user? Click here</a></p>
</form>

</body>



