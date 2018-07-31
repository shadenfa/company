<!DOCTYPE html>
<html lang="en">
<head>
  <title>admin permissions</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../css/main.css">
   <link rel="stylesheet" type="text/css" href="../css/search.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../css/admin.css">
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

</head>
<body>

<div class="container">
 <img src="../img/home/logo.png" width="160" height="70"  alt="logo">
 <div class="section row">
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


 <div class="row"> 
  <div id="permissions" style=" margin-top: 25px;  margin-bottom: -66;">
  <div id="permissions-b">
  
         <div class ="add  col-sm-12 col-xs-12 col-md-4 col-lg-4"> 
              <div ><a href="../php/add-page.php"><img id="addi" src="../img/admin/add.png" class="img-thumbnail"  width="400" height="1000" alt="add"><p>add </p></a> </div></div>
 
         <div class ="edit  col-sm-12 col-xs-12 col-md-4 col-lg-4"> 
               <div > <a href="../php/edit.php"><img id="editi" src="../img/admin/edit.png"  class="img-thumbnail"  width="400" height="1000"  alt="edit"><p>edit</p></a></div> </div>
		 
		 <div class ="delete  col-sm-12 col-xs-12 col-md-4 col-lg-4"> 
               <div > <a href="../php/delete.php"><img id="deletei" src="../img/admin/delete.png"  class="img-thumbnail"  width="400" height="1000"  alt="delete"><p>delete </p> </a></div> </div>
		 

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
                        <li> <a href="#"> <img src="../img/home/email.png" width="30" height="30"  alt="email">  </i> </a> </li>
                        <li> <a href="https://ar-ar.facebook.com"> <img src="../img/home/facebook.png" width="30" height="30" alt="facebook">  </i> </a> </li>
                        <li> <a href="https://twitter.com/"> <img src="../img/home/twitter.png" width="30" height="30"  alt="twitter">  </i> </a> </li>
                        
                    </ul>
                </div> 
            </div>
        </div>
    </div>
    <!--/.footer-bottom--> 
</footer>
</div>
</div>




</body>
</html>