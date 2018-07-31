<?php
//Artworks of Scanhead   HNU 2017

include('db.class.php'); // call db.class.php
$mydb = new db(); // create a new object, class db()


?>

 <?php include_once 'DB.inc.php';?>
<!DOCTYPE html>
<html>
<head>
<title>Human Resources permission</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
 <link rel="stylesheet" type="text/css" href="../css/main.css">
  <link rel="stylesheet" type="text/css" href="../css/search.css">
<link href="../css/style.css" rel="stylesheet" type="text/css">
<script src="../js/jquery-1.11.3-jquery.min.js"></script> 
<script type="text/javascript" src="../js/jquery.bootpag.min.js"></script>
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="../js/typeahead.min.js"></script>
    <script>
    $(document).ready(function(){
    $('input.typeahead').typeahead({
        name: 'typeahead',
        remote:'../php/search.php?key=%QUERY',
        limit : 10
    });
});
    </script>
<script type="text/javascript">

$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"fetch_HR.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});


function showRow(row)
{
	var x=row.cells;
	document.getElementById("Type").value = x[0].innerHTML;
	document.getElementById("Quantity").value = x[1].innerHTML;

}

</script>



</head>
<body>
</br>
<div class="container">

 <img src="../img/home/logo.png" width="160" height="70"  alt="logo">
 
<nav class="navbar navbar-inverse">
  
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
      <li class="active"><a href="home.php">Home</a></li>
        <li><a href="employees.php">Employees</a></li>
        <li><a href="home.php #contact">Contact us</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
		<li><a href="logOut.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
      <form class="navbar-form navbar-right"  action="search.php"  method="POST">
      <div class="input-group">
        <input type="text" name="typeahead" class="typeahead tt-query" autocomplete="off" spellcheck="false" placeholder="search">
        <div class="input-group-btn">
          <button class="btn btn-default" type="submit"  name="submit" onclick="getConfirmation();">
            <i class="glyphicon glyphicon-search"></i>
          </button>
        </div>
      </div>
    </form>
    </div>
  
</nav>

	<div class="panel panel-default">
	<div class="panel-heading"><h2>HR Managment </h2></div>
	<div class="panel-body"> 
	<ul class="nav nav-tabs">
		
	
	</ul></br>
		<div class="col-sm-6">
		
		
		<div class=".col-md-6">
          <div class="panel panel-default">
          <div class="bs-example">
         
		 
		  <div class="form-group">
           <div class="input-group">
            <span class="input-group-addon">Search</span>
            <input type="text" name="search_text" id="search_text"  class="form-control" />
           </div>
         </div>
		 
		

	       </div>
          </div>
        </div>
			
		
		
		
		
				<table class="table table-striped table-hover" id="main">
				<thead>
				  <tr>
					<th>Type</th>
					<th>Quantity</th>
				  </tr>
				</thead>
				
				

				<tbody id="result">
					
				</tbody>
				</table>
			<div class="paging_link"></div>
		</div>
		<div class="col-sm-6">
			<form class="form-horizontal" method="post">
				
				
			  <div class="form-group">
				<label class="control-label col-sm-3">Type:</label>
				<div class="col-sm-9">
				  <input type="text" class="form-control" id="Type" required placeholder="Type" name="Type" >
				</div>
			  </div>
			 
			 
			  <div class="form-group">
				<label class="control-label col-sm-3">Quantity:</label>
				<div class="col-sm-9"> 
				  <input type="numbers" class="form-control" id="Quantity" required placeholder="Quantity" name="Quantity">
				</div>
			  </div>
			  
			 
			  <div class="form-group"> 
				<div class="col-sm-offset-3 col-sm-9">
				  <button type="submit" class="btn btn-default" name="add">Add</button>
				</div>
			  </div>
			  
			   <div class="form-group"> 
				<div class="col-sm-offset-3 col-sm-9">
				  <button type="submit" class="btn btn-default" name="edit">edit</button>
				</div>
			  </div>
			  
			   <div class="form-group"> 
				<div class="col-sm-offset-3 col-sm-9">
				  <button type="submit" class="btn btn-default" name="delete">delete</button>
				</div>
			  </div>

			</form>
		</div>
	</div>


<?php
	
	
   
  if (isset($_POST['add'])) {
	  include_once 'DB.inc.php';
	$Type = mysqli_real_escape_string( $con ,$_POST['Type']) ;
   $Quantity = mysqli_real_escape_string( $con ,$_POST['Quantity']) ; 
   
    $qry="INSERT INTO  resourses (type,quantity) VALUES ('$Type' ,'$Quantity');"; 
     mysqli_query($con,$qry);  
				 
  
	}
	
	else if (isset($_POST['edit']))
	{
		$Type = mysqli_real_escape_string( $con ,$_POST['Type']) ;
		$Quantity = mysqli_real_escape_string( $con ,$_POST['Quantity']) ; 
         	$qry="select id from resourses where type='$Type';";
	         $result= mysqli_query($con,$qry);
	        if($result){

             while ($info = $result->fetch_assoc())  
	{
		   $id=$info['id'];			
            $sql= "UPDATE resourses SET quantity = '$Quantity'  where id='$id' ;";
             mysqli_query($con, $sql);
	}
	}}
else if(isset($_POST['delete'])) 
    {
    $type = mysqli_real_escape_string( $con ,$_POST['Type']) ; 
	$qry="select id from resourses where type='$type' ;";
	$result= mysqli_query($con,$qry);
	if($result){

      while ($info = $result->fetch_assoc())
	  
	{
		 $id=$info['id'];
         $sql="DELETE FROM resourses where id=".$id.";";
         mysqli_query($con, $sql);
	}
	}
	}
	
?>
			

	
	</div>
	<footer>
    <div class="footer-bottom">
        <div class="container">
		
            <p class="pull-left">&copy; 2018 CopyRight.Company- All Rights Reserved. </p>
            <div class="pull-right">
                 <div class="col-lg-12 col-md-6 col-sm-12 col-xs-12 ">
                    <ul class="social">
                        <li> <a href="#"> <img src="../img/home/email.png" width="30" height="30"  alt="email">   </a> </li>
                        <li> <a href="https://ar-ar.facebook.com"> <img src="../img/home/facebook.png" width="30" height="30" alt="facebook">   </a> </li>
                        <li> <a href="https://twitter.com/"> <img src="../img/home/twitter.png" width="30" height="30"  alt="twitter">  </a> </li>
                        
                    </ul>
                </div> 
            </div>
        </div>
    </div>
    <!--/.footer-bottom--> 
</footer>

</div>

</body>
</html>