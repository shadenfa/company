<?php

if (isset($_POST['Add'])) {
	include_once 'DB.inc.php'; 
	
	 $qry="SELECT * FROM add_employees ";
        $result=mysqli_query($con,$qry);
       if($result){
        while ($info=mysqli_fetch_array($result)) {
         $num=$info['EXT'];
		 $emp_email=$info['email'];
		
	   }}
	   
	$k = mysqli_real_escape_string( $con ,$_POST['key']) ;
$fname = mysqli_real_escape_string( $con ,$_POST['fname']) ;   
$lname =mysqli_real_escape_string( $con ,$_POST['lname'])  ;   
$email = mysqli_real_escape_string( $con ,$_POST['email']) ; 
$EXT = mysqli_real_escape_string( $con ,$_POST['EXT']) ; 
$description =mysqli_real_escape_string( $con ,$_POST['description']) ;

 
            $image_name= $_FILES['pic']['name'];
			$image_tmp= $_FILES['pic']['tmp_name'];
			$size=$_FILES['pic']['size'];
			$type=$_FILES['pic']['type'];//image
			$erroe=$_FILES['pic']['error'];//image
			
			move_uploaded_file($image_tmp,"../uploaded/".$image_name);
			if (empty($fname) || empty($lname) || empty($email) || empty($EXT) || empty($description)) {
echo "<script>if(confirm('There is an error in the entered data. Please make sure ')){document.location.href='add-page.php'};</script>";
   exit(); 
}
else {
		
		if($num==$EXT){
			 echo "<script>if(confirm('Duplicate EXT number. Please make sure')){document.location.href='add-page.php'};</script>";
		}

	else {
			if( strlen($EXT)!=4)  {
echo "<script>if(confirm('EXT should contains 4 numbers. Please make sure')){document.location.href='add-page.php'};</script>";
    }
	else{ 
		if (!preg_match("/^[a-zA-Z]*$/", $fname)) {
echo "<script>if(confirm('There is an error in the entered data. Please make sure ')){document.location.href='add-page.php'};</script>";
   exit(); 
	}
	
		
		
			else {
				$parts=explode("@", $email);
                $username=$parts[0];
				
            function random_password( $length = 8 ) {
            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            $password = substr( str_shuffle( $chars ), 0, $length );
            return $password;
			     }
	
	        $password=random_password();
			$encrypt_password=md5( $password);

				$qry="INSERT INTO  add_employees (k,fname,lname ,email,EXT,description,a_image,username,password) VALUES ('$k' ,'$fname' ,'$lname','$email','$EXT','$description','$image_name','$username','$encrypt_password');"; 
				 mysqli_query($con,$qry);  
				 
		echo "<script>{document.location.href='add-page.php'};</script> ";
		}
	
		}
}

}
}
       ?>
	   
	

	   
	  