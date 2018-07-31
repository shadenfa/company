<?php
 include_once 'DB.inc.php';
     if (isset($_POST['submit'])) 
    {
	 $qry="SELECT * FROM add_employees ";
        $result=mysqli_query($con,$qry);
       if($result){
        while ($info=mysqli_fetch_array($result)) {
         $num=$info['EXT'];
		 $emp_email=$info['email'];
		
	   }}
 		
$fname = $_POST['fname'] ;   
$lname =mysqli_real_escape_string( $con ,$_POST['lname']) ;
$email = mysqli_real_escape_string( $con ,$_POST['email']) ; 
$EXT = mysqli_real_escape_string( $con ,$_POST['EXT']) ;
$description =mysqli_real_escape_string( $con ,$_POST['description']) ;

    
       $image_name= $_FILES['pic']['name'];
      $image_tmp= $_FILES['pic']['tmp_name'];
      $size=$_FILES['pic']['size'];
      $type=$_FILES['pic']['type'];//image
      $erroe=$_FILES['pic']['error'];//image

      //move image to the dirctory named uploaded
      $dir_name=dirname(__FILE__)."/../uploaded/";
      move_uploaded_file($image_tmp,"$dir_name".$image_name);

	  ////////////////////////////////////
	  	$qry="select a_id from add_employees where email='$email' "; 
	$result= mysqli_query($con,$qry);
	if($result){

      while ($info = $result->fetch_assoc())
	  
	{




		 $id=$info['a_id'];

 $sql= "UPDATE add_employees SET fname = '$fname'  WHERE a_id ='$id' ;";
 mysqli_query($con, $sql);
  $sql= "UPDATE add_employees SET lname = '$lname'  WHERE a_id ='$id' ;";
 mysqli_query($con, $sql);
 if(!empty($description)){
  $sql= "UPDATE add_employees SET description = '$description'  WHERE a_id ='$id' ;";
 mysqli_query($con, $sql);}
 

 	if(!empty($EXT)){
	 		if( strlen($EXT)!=4)  {
			echo "<script>if(confirm('EXT should contains 4 numbers. Please make sure')){document.location.href='edit.php'};</script>";}

			else{
		
		if($num==$EXT){
			 echo "<script>if(confirm('Duplicate EXT number. Please make sure')){document.location.href='add-page.php'};</script>";
		}
			
			else{
              $sql= "UPDATE add_employees SET EXT = '$EXT'  WHERE a_id ='$id' ;";
              mysqli_query($con, $sql);}
 }
 }
 


	
 
if(!empty($image_name)){
$sql= "UPDATE add_employees SET a_image = '$image_name' WHERE a_id ='$id' ; ";
 mysqli_query($con, $sql);
}
 
  $sql= "UPDATE add_employees SET email = '$email'  WHERE a_id ='$id' ;";
   mysqli_query($con, $sql);
	}
	}
	

header( 'Location: edit.php' ) ;
	
	}

?>