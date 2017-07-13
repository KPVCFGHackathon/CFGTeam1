<?php
// https://stackoverflow.com/questions/14453370/position-textarea-at-bottom-of-div-and-fill-to-width-2px-margins
//$postid=0;
$conn=new mysqli("localhost","root","","loginregister");
if($conn->connect_error)
 {
 	 die("Connection failed". $conn->connect_error);

 }
 else
 	echo "Connection successful";
session_start();
$post_title=$_SESSION['post-title'];
$post_id=$_SESSION['post-id'];
//$postid=$_SESSION['post-id'];

 
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
   
   <form method="post">
   

<?php  
$x=$_GET["id"];
$sql2="select * from posts_users where post_id='$x'";	

$result1=$conn->query($sql2);

if($result1->num_rows>0)
  {  
  	while($row=$result1->fetch_assoc())

  	{  
         if($row['type']=='p') 
         {  
         	$pid=$row['post_id'];
            
  	       echo "<p class='borderAroundPost' style='color:#FCFBFA;'>";
  		   
         echo"".$row['post_data'];
         
         echo"<br> -".$row['username']; 
  		   echo "</p>"; 
  		
  		 }

  		 
  	}
  	//echo  implode(" ",$posts);
 }

$sql98="SELECT *from comments where cpost_id='$x'";
$res98=$conn->query($sql98);
if($res98->num_rows>0)
  {  //echo"Entered if";
  	while($row98=$res98->fetch_assoc())
  	{

  		echo "<p class='borderAroundComment' style='color:#FCFBFA;'>";
  		   
         echo"".$row98['comment'];
         
         echo"<br> -".$row['username']; 
  		   echo "</p>"; 
  		
  	}


 } 	


   ?>

<?php
if(isset($_POST['comment-submit']))
{
	$text=$_POST['comments'];
	$sql4="INSERT into comments(comment,cpost_id)values('$text','$pid')";
	$conn->query($sql4);
}
 $sql5="SELECT * from comments where cpost_id='$post_id'";
  $res5=$conn->query($sql5);
     

?>


<textarea width="100%" rows="4" placeholder="comment" cols="50" name="comments" id="comment-text"></textarea>
<p><input type="submit" value="comment" name="comment-submit"></p>





	</form>
	
</body>
