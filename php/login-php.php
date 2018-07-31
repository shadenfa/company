<!--
//login.php
!-->

<?php

/*include('database_connection.php');

session_start();

$message = '';

if(isset($_SESSION['user_id']))
{
 header('location:chat.php');
}

if(isset($_POST["submit"]))
{
 $query = "
   SELECT * FROM add_employees 
    WHERE username = :username
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
    array(
      ':username' => $_POST["username"]
     )
  );
  $count = $statement->rowCount();
  if($count > 0)
 {
  $result = $statement->fetchAll();
    foreach($result as $row)
    {
      if($_POST["password"])
      {
        $_SESSION['a_id'] = $row['a_id'];
        $_SESSION['username'] = $row['username'];
        header("location:chat.php");
      }
      else
      {
       $message = "<label>Wrong Password</label>";
      }
    }
 }
 else
 {
  $message = "<label>Wrong Username</labe>";
 }
}*/

 include_once 'DB.inc.php'; 
include('database_connection.php');
   session_start();
   if (isset($_POST["submit"])){
		if(empty($_POST['username'])|| empty ($_POST['password'] )){
			
			echo "<script>if(confirm('username or password is invalid ')){document.location.href='login.php'};</script>";
			
		}
		else{
	
    $Name =$_POST["username"] ;   
    $Password =$_POST["password"] ; 
    
	$query="select * from add_employees where username='$Name' and password='$Password' ";
	$exe_query=mysqli_query($con,$query);
	$found_num_rows=mysqli_num_rows($exe_query);
	
	
	if($found_num_rows==1)
	{
		
		
	
		 $row = mysqli_fetch_assoc($exe_query); 
		 $_SESSION['a_id'] = $row['a_id'];
        $_SESSION['username'] = $row['username'];
      if($row['k'] == 1){
 
	    echo "<script>{document.location.href='admin_profile.php?id=".$row['a_id']."'};</script>";
      }else if($row['k'] == 2 ){
        echo "<script>{document.location.href='HR_profile.php?id=".$row['a_id']."'};</script>";
      }else if($row['k'] == 3 ){
        echo "<script>{document.location.href='employee_profile.php?id=".$row['a_id']."'};</script>";
      }
		
	
	} else{
		
		echo "<script>if(confirm('name or password is not correct please try again')){document.location.href='login.php'};</script>";
	}
	mysqli_close($con);
		}
}
	
?>


