
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
?>
  
<!DOCTYPE html>
<html lang="eng">
<head>
<script type="text/javascript">
	
	
</script>

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
   <p align="right"><a href="loginform.php">Post? Login here</a></p>
   <form method="post">
   

<?php  
$sql2="select * from posts_users";	

$result1=$conn->query($sql2);
$posts=array();
if($result1->num_rows>0)
  {  
  	while($row=$result1->fetch_assoc())

  	{
         if($row['type']=='p') 
         {  
           $_SESSION['post-title']=$row['post_title'];
           $_SESSION['post-id']=$row['post_id'];
  	     echo "<p class='borderAroundPost' style='color:#FCFBFA;'>";
  		   echo "<br><a href='viewpost.php?id=".$row['post_id']."'>";
         echo"".$row['post_title'];
          echo"</a>";
         echo"<br> -".$row['username']; 
  		   echo "</p>"; 
  		
  		 }

  		 
  	}
  	//echo  implode(" ",$posts);
 }
   ?><!--</p> -->
	<!--<p align="right"><a href="loginform.php">logout</a></p>-->

<br><br><br><br><!--<br><br><br><br><br><br><br><br><br><br><br><br><br><br>-->





	</form>
	
</body>
