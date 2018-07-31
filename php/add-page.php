<?php
//Artworks of Scanhead   HNU 2017

include('db.class.php'); // call db.class.php
$mydb = new db(); // create a new object, class db()


?>

 <?php include_once 'DB.inc.php';?>
<!DOCTYPE html>
<html>
<head>
<title>Add page</title>
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
   url:"fetch.php",
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
	document.getElementById("fname").value = x[0].innerHTML;
	document.getElementById("lname").value = x[1].innerHTML;
	document.getElementById("email").value = x[2].innerHTML;
	document.getElementById("description").value = x[3].innerHTML;
	document.getElementById("EXT").value = x[4].innerHTML;
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
	<div class="panel-heading"><h2>Add Employee </h2></div>
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
            <input type="text" name="search_text" id="search_text" placeholder="Search by Customer Details" class="form-control" />
           </div>
         </div>
		 
		

	       </div>
          </div>
        </div>
			
		
		
		
		
				<table class="table table-striped table-hover" id="main">
				<thead>
				  <tr>
					<th>First Name</th>
					<th>Last Name</th>
					<th>email</th>
					<th>description</th>
					<th>EXT</th>
				  </tr>
				</thead>
				
				

				<tbody id="result">
					
				</tbody>
				</table>
			<div class="paging_link"></div>
		</div>
		<div class="col-sm-6">
			<form class="form-horizontal" method="post" action="add_php.php" enctype="multipart/form-data" >
				
				  <div class="form-group">
				<label class="control-label col-sm-3">key:</label>
				<div class="col-sm-9">
				<select  class="form-control" id="key" required placeholder="key" name="key">
  <?php
$qry="SELECT * FROM category ";
$result=mysqli_query($con,$qry);
if($result){
  while ($info=mysqli_fetch_array($result)) {
    print "  <option value=" .$info['id']. ">".$info['name']. " </option>";
  }
}
 ?> 
 </select>
 
 
				  
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-sm-3">First Name:</label>
				<div class="col-sm-9">
				  <input type="text" class="form-control" id="fname" required placeholder="First Name" name="fname" >
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-sm-3">Last Name:</label>
				<div class="col-sm-9"> 
				  <input type="text" class="form-control" id="lname" required placeholder="Last Name" name="lname">
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-sm-3">email:</label>
				<div class="col-sm-9"> 
				  <input type="email" class="form-control" id="email" required placeholder="email" name="email">
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-sm-3">Job description:</label>
				<div class="col-sm-9"> 
				  <textarea class="form-control" id="description" required placeholder="description" name="description" col ="10" row ="10"></textarea>
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-sm-3">EXT:</label>
				<div class="col-sm-9"> 
				  <input type="numbers" class="form-control" id="EXT" required placeholder="EXT" name="EXT">
				</div>
			  </div>
			    <div class="form-group">
				<label class="control-label col-sm-3">Employee image:</label>
				<div class="col-sm-9">
				   <input type="file" name="pic" accept="image/*">
				</div>
			  </div>
			  <div class="form-group"> 
				<div class="col-sm-offset-3 col-sm-9">
				  <button type="submit" class="btn btn-default" name="Add">Add</button>
				</div>
			  </div>
			  <div class="form-group"> 
				<div class="col-sm-offset-3 col-sm-9">
				
				  <a href="../php/permissions-admin.php"><button type="button" class="btn btn-default" name="Back">Back</button></a>
				</div>
			  </div>
			</form>
		</div>
	</div>



	  
			

	
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