<!DOCTYPE html>
<html lang="en">
<head>
  <title>Company</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../css/main.css">
  <link rel="stylesheet" type="text/css" href="../css/search.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
      <script src="../js/typeahead.min.js"></script>
 <?php include_once 'DB.inc.php';?>
 <?php include('contact.php');?>
    

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
        <li><a href="#contact">Contact us</a></li>
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

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
    </ol>

    <!-- Wrapper for slides -->
	
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="../img/sliderimage/company.jpg" alt="Image">
        <div class="carousel-caption">
    
        </div>      
      </div>

      <div class="item">
       <img src="../img/sliderimage/company1.jpg" alt="Image">
        <div class="carousel-caption">
        </div>      
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>
  
    
  <br><br><br>

  
  
   <div class="container">
   <div id="sec">    
<div class ="employees  col-sm-12 col-xs-12 col-md-12 col-lg-12">  
  <a href="employees.php"><img id="employees1" src="../img/home/employees1.jpg" class="img-thumbnail" alt="Cinque Terre">
<p>Employees </p></a>  </div> 

  </div>
  </div>
  </div>
<br>



<div class ="contact row"> 
<h1>contact us</h1>

<div class ="left col-sm-12 col-xs-12 col-md-6 col-lg-6">
  <p>CONTACT INFORMATON</p>
  <hr>
  <ol>
<li><i class="material-icons">&#xe916;</i> saturday_thursday:8:00 AM to 4:00 PM</li>
<li><i class="material-icons">&#xe0c8;</i> address:Riyadh-olaya street  </li>
<li><i class="material-icons">&#xe0b0;</i> phone:(+966)555555555</li>
<li><i class="material-icons">&#xe0be;</i><a href="mailto:company@gmail.com?
Subject=Hello%20again" target="_top">
 Email:info@company.com</a> </li>
</ol>
</div>
<div class ="right col-sm-12 col-xs-12 col-md-6 col-lg-6">
<p> LEAVE US A MESSAGE</p>
<hr>
<form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>"  method="POST">
  <input type="text" name="name" placeholder="name" value="<?= $name ?>"  >
  <span class="error"><?= $name_error ?></span> 
  <br><br> 
  <input type="text" name="Email" placeholder="Email" value="<?= $Email ?>">
   <span class="error"><?= $Email_error ?></span>
    <br><br>
  <input type="text" name="tel" placeholder="phone No"  value="<?= $tel ?>">
    <span class="error"><?= $tel_error ?></span>
  <br><br>
 <p>  message:</p>
  <textarea  type="text" name="message" rows="10" cols="50" value="<?= $message ?>"></textarea><br>
     <span class="error"><?= $message_error ?></span>
   <br><br>
  <input type="submit" value="Submit" name="submit"> 
 
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
                        <li> <a href="https://ar-ar.facebook.com"> <img src="../img/home/facebook.png" width="30" height="30" alt="facebook">  </a> </li>
                        <li> <a href="https://twitter.com/"> <img src="../img/home/twitter.png" width="30" height="30"  alt="twitter">  </a> </li>
                        
                    </ul>
                </div> 
            </div>
        </div>
    </div>
    <!--/.footer-bottom--> 
</footer>


</body>
</html>
