<!DOCTYPE html>
<html lang="en">
<head>
  <title>order page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="../css/login.css">
	<link rel="stylesheet" type="text/css" href="../css/EmpProfile.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  
  
 <?php include_once 'DB.inc.php';?>
 <?php  include_once 'login-php.php'; ?>

</head>
<body>

<div class="container">
 <img src="../img/home/logo.png" width="160" height="70"  alt="logo">
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
       <form class="navbar-form navbar-right"  action="/search.php"  method="POST">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search" name="search" autocomplete="on">
        <div class="input-group-btn">
          <button class="btn btn-default" type="submit">
            <i class="glyphicon glyphicon-search"></i>
          </button>
        </div>
      </div>
    </form>
    </div>
  
</nav>

 <div id="i">

   <div class="table">
   <form action="" method= "post">
   <h4 >select how to view table  </h4>
 <select  class="form-control" id="select"  name="select">
 
  <?php
$qry="SELECT * FROM state ";
$result=mysqli_query($con,$qry);
if($result){
	print "<option > ALL Status </option>";
  while ($row=mysqli_fetch_array($result)) {
	  
    print "  <option value=" .$row['id']. ">".$row['name']. " </option>";
  }
  //$select =mysqli_real_escape_string( $con ,$_POST['select']) ;
  //echo $select;
}
 ?> 
 </select><br>
<button type="submit" name="btn_select"   class="btn btn-info btn-xs" >Select  </button></form>
 <?php
  
//header("Refresh:1");
 if (isset($_POST['check'])) {
	$val = $_POST['check'];
	include_once 'DB.inc.php';
	$qry="select * from orders,resourses where OrderNumber=$val and orders=id"; 
	$result= mysqli_query($con,$qry);
	
	$id=$_GET['id'];
    $q="UPDATE orders SET HR_id='$id' where OrderNumber='$val';";
	mysqli_query($con, $q);
			 
	if($result){

      while ($info = $result->fetch_assoc())
	  
	  {
	    if($info['orders']==$info['id'] && $info['Quantity']<=$info['quantity'])
		{
			//echo " ok";
			$value=$info['quantity']-$info['Quantity'];
		   
	
		$sql= " UPDATE resourses SET quantity ='$value' where(select Quantity from orders where orders=id and OrderNumber='$val' ) ;";
            mysqli_query($con, $sql);
		
			//$status = '<span class="label label-success">accepted </span>';
			$state="UPDATE orders SET state_name=3 where OrderNumber=$val;";
			mysqli_query($con, $state);			
			echo("<meta http-equiv='refresh' content='0'>");

			 
		}
		else
		{
		//	echo "not ok";
			//$status ='<span class="label label-danger">cancel</span>';
	      $state="UPDATE orders SET state_name=4 where OrderNumber=$val;";
			mysqli_query($con, $state);
			echo("<meta http-equiv='refresh' content='0'>");
		}
	}}
	
}
 if (isset($_POST['btn_select'])){
	 
	 
//header("Refresh:1");

 // $btn = $_POST['btn_select'];
  
  $btn =mysqli_real_escape_string( $con ,$_POST['select']) ;

  $qry="SELECT * FROM orders,add_employees,resourses where  a_id=emp_id and  id=orders and state_name=$btn ";
  $result=mysqli_query($con,$qry);


if($btn==2 ){
 echo '<h4  >Orders:</h4> <table class="table table-bordered table-striped">';
 echo '<tr>';
 echo ' <th width="15%">Order Number</th>';
 echo ' <th width="15%">Employee name</th>';
 echo ' <th width="15%">Order Type</th>';
 echo ' <th width="15%">Order Quantity</th>';
 echo ' <th width="20%">Date</th>';
 echo '<th width="10%">check</th>';
 echo '<th width="20%">Status</th>';
 echo '</tr>';
  
	
if($result->num_rows > 0){
	
	 while($info = $result->fetch_assoc()){
		 
		 if($info['state_name'] == 2){
              $status='<span class="label label-warning">pending</span>';   
      }else if($info['state_name'] == 3){
        $status = '<span class="label label-success">accepted </span>';
      }else if($info['state_name'] == 4 ){
        $status ='<span class="label label-danger">cancel</span>';
      }
		 
echo '<tr>';
	echo '<td>'.$info['OrderNumber']. '</td>' ;
	echo' <td>'.$info['fname'].' '.$info['lname'].'</td>';
	echo '<td>'.$info['type'].'</td>';
	echo'<td>'.$info['Quantity'].'</td>';
	echo' <td>'.$info['order_date'].'</td>';
	echo'<td> 	
	<form method="post" >
  <button type="submit" name="check"  id="disable_check"  value='.$info['OrderNumber'].' class="btn btn-info btn-xs" >check </button> </form> </td> ';

  echo '<td> '.$status.'</td>';
echo '</tr>';
	  
	   
  }

}
}

else  if($btn==3){
	echo '<h4  >Orders:</h4> <table class="table table-bordered table-striped">';
 echo '<tr>';
 echo ' <th width="15%">Order Number</th>';
 echo ' <th width="15%">Employee name</th>';
 echo ' <th width="15%">Order Type</th>';
 echo ' <th width="15%">Order Quantity</th>';
 echo ' <th width="20%">Date</th>';
 echo '<th width="20%">Status</th>';
 echo '</tr>';
if($result->num_rows > 0){
	 while($info = $result->fetch_assoc()){
		 
		 if($info['state_name'] == 2){
              $status='<span class="label label-warning">pending</span>';   
      }else if($info['state_name'] == 3){
        $status = '<span class="label label-success">accepted </span>';
      }else if($info['state_name'] == 4 ){
        $status ='<span class="label label-danger">cancel</span>';
      }
		 
echo '<tr>';
	echo '<td>'.$info['OrderNumber']. '</td>' ;
	echo' <td>'.$info['fname'].' '.$info['lname'].'</td>';
	echo '<td>'.$info['type'].'</td>';
	echo'<td>'.$info['Quantity'].'</td>';
	echo' <td>'.$info['order_date'].'</td>';
	echo '<td> '.$status.'</td>';
    echo '</tr>';
	  
	   
  }

}
}

else if($btn==4){
	echo '<h4  >Orders:</h4> <table class="table table-bordered table-striped">';
 echo '<tr>';
 echo ' <th width="15%">Order Number</th>';
 echo ' <th width="15%">Employee name</th>';
 echo ' <th width="15%">Order Type</th>';
 echo ' <th width="15%">Order Quantity</th>';
 echo ' <th width="20%">Date</th>';
 echo '<th width="20%">Status</th>';
 echo '</tr>';
if($result->num_rows > 0){
	 while($info = $result->fetch_assoc()){
		 
		 if($info['state_name'] == 2){
              $status='<span class="label label-warning">pending</span>';   
      }else if($info['state_name'] == 3){
        $status = '<span class="label label-success">accepted </span>';
      }else if($info['state_name'] == 4 ){
        $status ='<span class="label label-danger">cancel</span>';
      }
		 
echo '<tr>';
	echo '<td>'.$info['OrderNumber']. '</td>' ;
	echo' <td>'.$info['fname'].' '.$info['lname'].'</td>';
	echo '<td>'.$info['type'].'</td>';
	echo'<td>'.$info['Quantity'].'</td>';
	echo' <td>'.$info['order_date'].'</td>';
	echo '<td> '.$status.'</td>';
    echo '</tr>';
	  
	   
  }

}
}

else{
  $qry="SELECT * FROM orders,add_employees,resourses where  a_id=emp_id and  id=orders  ";
$res=mysqli_query($con,$qry);

	echo '<h4  >Orders:</h4> <table class="table table-bordered table-striped">';
 echo '<tr>';
 echo ' <th width="15%">Order Number</th>';
 echo ' <th width="15%">Employee name</th>';
 echo ' <th width="15%">Order Type</th>';
 echo ' <th width="15%">Order Quantity</th>';
 echo ' <th width="20%">Date</th>';
 echo '<th width="20%">Status</th>';
 echo '</tr>';
if($res->num_rows > 0){
	 while($info = $res->fetch_assoc()){
		 
		 if($info['state_name'] == 2){
              $status='<span class="label label-warning">pending</span>';   
      }else if($info['state_name'] == 3){
        $status = '<span class="label label-success">accepted </span>';
      }else if($info['state_name'] == 4 ){
        $status ='<span class="label label-danger">cancel</span>';
      }
		 
echo '<tr>';
	echo '<td>'.$info['OrderNumber']. '</td>' ;
	echo' <td>'.$info['fname'].' '.$info['lname'].'</td>';
	echo '<td>'.$info['type'].'</td>';
	echo'<td>'.$info['Quantity'].'</td>';
	echo' <td>'.$info['order_date'].'</td>';
    echo '<td> '.$status.'</td>';
    echo '</tr>';
	  
	   
  }

}
}

echo '</table>';
  
  }




		  
	  
	



  




 ?>
   </div>
   </div>
<!--<script>
            $('#disable_check').on('click', function(){
               // alert('Button clicked. Disabling...');
                $('#disable_check').attr("disabled", true);
            });
        </script>!-->

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

