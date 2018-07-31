<?php
    $key = ''; 
if( isset( $_GET['key'])) {
    $key = $_GET['key']; 
} 
    $array = array();
    $con=mysqli_connect("localhost","root","","company");
    $query=mysqli_query($con, "select * from add_employees where fname LIKE '%{$key}%' or lname LIKE '%{$key}%' or EXT LIKE '%{$key}%'");
    while($row=mysqli_fetch_assoc($query))
    {
      $array[] = $row['fname']." ".$row['lname']." ".$row['EXT'] ;
	  $a[] = $row['EXT'] ;
    }
    echo json_encode($array);
    mysqli_close($con);
	////////////////////////////////////////////////
	if( isset( $_POST['submit']))
	{
		 include_once 'DB.inc.php';		
	
         $name = $_POST['typeahead'] ; 
		 $parts=explode(" ", $name);
          
		  $fname=$parts[0];
		  $lname=$parts[1];
		  $EXT=$parts[2];
		  
         $query="select * from add_employees where fname='$fname' and lname='$lname' and EXT='$EXT' ";
	     $result=mysqli_query($con,$query);

while ($row=mysqli_fetch_array($result)) {

     if($fname== $row['fname'] and $lname== $row['lname'] and $EXT== $row['EXT'] ){
     
		echo "<script>{document.location.href='searchResult.php?id=".$row['a_id']."'};</script>";

	}}}
	////////////////////////////////////////////////////
?>


   

