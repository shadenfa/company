<?php 

// define variables and set to empty values
$name_error = $Email_error = $tel_error = $message_error= "";
$name = $Email = $tel = $message = $success = "";

//form is submitted with POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $name_error = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $name_error = "Only letters and white space allowed"; 
    }
  }

  if (empty($_POST["Email"])) {
    $Email_error = "Email is required";
  } else {
    $Email = test_input($_POST["Email"]);
    // check if e-mail address is well-formed
   if (!filter_var($Email,FILTER_VALIDATE_EMAIL)){
      $Email_error = "Invalid email format"; 
    }
  }
  
  if (empty($_POST["tel"])) {
    $tel_error = "Phone is required";
  } else {
    $tel = test_input($_POST["tel"]);
    // check if phone is well-formed
     if (!preg_match("/^(\d[\s-]?)?[\(\[\s-]{0,9}?\d{3}[\)\]\s-]{0,9}?\d{3}[\s-]?\d{4}$/i",$tel)) {
      $tel_error = "Invalid phone number"; 
    }
  }


  if (empty($_POST["message"])) {
     $message_error = "message is required";
  } else {
    $message = test_input($_POST["message"]);
  }
  
  if ($name_error == '' and $Email_error == '' and $tel_error == ''  and $message_error ==''){
      $message_body = '';
      unset($_POST['submit']);
      foreach ($_POST as $key => $value){
          $message_body .=  "$key: $value\n";
		 
      }
   		  
		  $qry="INSERT INTO  contact (c_name ,c_email,c_phone,c_message) VALUES ('$name','$Email','$tel','$message');"; 
				 mysqli_query($con,$qry);
	
	$message =  "Message sent, thank you for contacting us!";
echo "<SCRIPT>
alert('$message');
</SCRIPT>";
         
          $name = $Email = $tel = $message =  '';
      

      
				  
  }
  
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>