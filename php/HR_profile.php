
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Human Resources profile</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../css/main.css">
   <link rel="stylesheet" type="text/css" href="../css/search.css">
    <link rel="stylesheet" type="text/css" href="../css/login.css">
	 <link rel="stylesheet" type="text/css" href="../css/EmpProfile.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
  
 <?php include_once 'DB.inc.php';?>
 <?php include_once 'login-php.php';?>


</head>
<body>

<div class="container">
 <img src="../img/home/logo.png" width="160" height="70"  alt="logo">
 <div id="profile">
 <h4 id="profile_name">Welcome  <i><?php echo$_SESSION['username']; ?></i></h4> <br>
     
	 </div>
 <div class="section row">
<nav class="navbar navbar-inverse">
  
    <div class="navbar-header">
     
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



        <?php
$id=$_GET['id'];
$qry="SELECT * FROM add_employees WHERE a_id='$id'";

$result=mysqli_query($con,$qry);

if($result){

  while ($info=mysqli_fetch_array($result)) {

print "<div id='i'><div class='jumbotron' style='border:1.5px solid black'>
                  <div class='row'>
                      <div class='col-md-4 col-xs-12 col-sm-6 col-lg-4'>
                          <img src='../uploaded/".$info['a_image']."' id='profileImg'  alt='emplotees' >
                      </div>
                      <div class='col-md-8 col-xs-12 col-sm-6 col-lg-8'>
                          <div class='container' style='border-bottom:1px solid black'>
                            <h2>".$info['fname']." ".$info['lname']."</h2>
                          </div>
                            <hr>
                          <ul class='container details'>
                            <li><h4><span class='glyphicon glyphicon-earphone one' style='width:50px;'></span>".$info['EXT']."</h4></li>
                            <li><h4><span class='glyphicon glyphicon-envelope one' style='width:50px;'></span>".$info['email']."</h4></li>
                            <li><h4><span class='glyphicon glyphicon-pencil one' style='width:50px;'></span>".$info['description']."</h4></li>
                           
                          </ul>
                      </div>
                  </div>
                </div>
				 	<a href='chat.php'><button type='button' class='btn btn-default  btn-lg ' name='button'>Direct message</button></a>
					<a href='orders.php?id=".$info['a_id']."'><button type='button' class='btn btn-default  btn-lg ' name='button'>orders</button></a>
					<a href='permissions-HR.php?id=".$info['a_id']."'><button type='button' class='btn btn-default  btn-lg ' name='button'>permissions</button></a>
		
				</div>";

  }

}

      ?>

 <br>
 <div id="i">
   <div class="table">
 <?php
 $id=$_GET['id'];
 $qry="SELECT * FROM orders,resourses where  HR_id='$id' and  id=orders ";

$result=mysqli_query($con,$qry);

$output = '<h4 >orders you received :</h4> <table class="table table-bordered table-striped">
 <tr>
  <th width="20%">Order Number</td>
   <th width="20%">Type</td>
  <th width="20%">Quantity</td>
  <th width="20%">Status</td>
  <th width="40%">Date</td>
 </tr>';
 
if($result){

  while ($info=mysqli_fetch_array($result)) {
	  
if($info['state_name'] == 2||$info['state_name']==NULL){
              $status='<span class="label label-warning">pending</span>';   
      }else if($info['state_name'] == 3){
        $status = '<span class="label label-success">accepted </span>';
      }else if($info['state_name'] == 4 ){
        $status ='<span class="label label-danger">cancel</span>';
      }
 
$output .= '<tr>
  <td>'.$info['OrderNumber'].'</td><td>'.$info['type'].'</td><td>'.$info['Quantity'].'</td>
  <td>'.$status.'</td><td>'.$info['order_date'].'</td>
  </tr>
';
  }
}
 $output .= '</table>';
 echo $output;
 ?>
   </div>
   </div>
 
 


<footer>
    <div class="footer-bottom">
        <div class="container">
		
            <p class="pull-left">&copy; 2018 CopyRight.Company- All Rights Reserved. </p>
            <div class="pull-right">
                 <div class="col-lg-12 col-md-6 col-sm-12 col-xs-12 ">
                    <ul class="social">
                        <li> <a href="#"> <img src="../img/home/email.png" width="30" height="30"  alt="email">  </a> </li>
                        <li> <a href="https://ar-ar.facebook.com"> <img src="../img/home/facebook.png" width="30" height="30" alt="facebook">  </a> </li>
                        <li> <a href="https://twitter.com/"> <img src="../img/home/twitter.png" width="30" height="30"  alt="twitter"></a> </li>
                        
                    </ul>
                </div> 
            </div>
        </div>
    </div>

</footer>



  
 
  </div>
</div>

</body>
</html>
