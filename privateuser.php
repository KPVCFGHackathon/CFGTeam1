
<?php
// https://stackoverflow.com/questions/14453370/position-textarea-at-bottom-of-div-and-fill-to-width-2px-margins
//$postid=0;
session_start();
$conn=new mysqli("localhost","root","","loginregister");
if($conn->connect_error)
 {
 	 die("Connection failed". $conn->connect_error);

 }
 else
 	echo "Connection successful";
if(!$_SESSION['loggeduser'] || !$_SESSION['enteredpassword'])
{
  header('location:loginform.php');
}
$username=$_SESSION['loggeduser'];
$password=$_SESSION['enteredpassword'];

if(!$_SESSION['loggeduser'] || !$_SESSION['enteredpassword'])
{
	header('location:loginform.php');
}

if(isset($_POST['logout-submit']))   
  { //echo "you tried to logout";
  	header('location:loginform.php');
  	session_destroy();
  }
 
 





//echo " logged in as <br> ".$username ;


?>
<!DOCTYPE html>
<html lang="eng">
<head>
<script type="text/javascript">
	
	var textarea = document.getElementById('comment-text');
textarea.scrollTop = textarea.scrollHeight;
</script>
<h1 align="center" style="color:#FCFBFA;">Welcome <?php echo"$username" ?></h1>
</head>
<style type="text/css">
.borderAroundPost
{
border-style:solid;
border-color:#FCFBFA;
padding: 15px;
margin:25px;
width:70%;
}
.borderAroundComment
{
border-style:solid;
border-color:#000000;
padding: 15px;
margin:25px;
width:25%;
}
</style>
<body background="blue.jpg">
   
   <form method="post">
   <p align="right"><input type="submit" value="Logout" name="logout-submit">

<?php

$sql2="select * from posts_users";  

$result1=$conn->query($sql2);
$posts=array();
if($result1->num_rows>0)
  {  
    while($row=$result1->fetch_assoc())

    { $_SESSION['post-id']=$row['post_id'];
         if($row['type']=='p') 
         {  
           
           
         echo "<p class='borderAroundPost' style='color:#FCFBFA;'>";
         echo "<br><a href='viewpost.php?id=".$row['post_id']."' >";
         echo"".$row['post_title'];
         $_SESSION['post-title']=$row['post_title'];
          echo"</a>";
         echo"<br> -".$row['username']; 
         echo "</p>"; 
      
       }

       
    }
    //echo  implode(" ",$posts);
 }
 if(isset($_POST['post-button']))
 { $postoftitle=$_POST['postTitle'];
   $data=$_POST['posts'];
   $t="p";
   echo" ".date("h:i:sa");
   $post_time=date("h:i:sa");

   $sql99="INSERT into posts_users(username,post_data,type,post_title,post_time)values('$username','$data','$t','$postoftitle','$post_time')";
   $result99=$conn->query($sql99);
   if($result99)
   {
    echo " inserted";
   }
   else
    echo"failed";
 }
?>

<br><br><br><br><!--<br><br><br><br><br><br><br><br><br><br><br><br><br><br>-->
<p><input type="text" placeholder="Enter title" name="postTitle"></p>
<textarea width="100%" rows="4" placeholder="post" cols="50" name="posts" id="comment-text"></textarea>

<p align="left"><input type="submit" value="Post" name="post-button"></p>


	</form>
	
</body>
