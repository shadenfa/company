<?php
//Artworks of Scanhead   HNU 2017
include('db.class.php'); // call db.class.php
$mydb = new db(); // create a new object, class db()

$conn = $mydb->connect();

if(isset($_POST["query"]))
{

$q = $_POST["query"];
	
$results = $conn->prepare("SELECT * FROM resourses  WHERE quantity  LIKE '%" . $q . "%'");


}
else
{
 
 $results = $conn->prepare("SELECT * FROM resourses ");

}

$results->execute();
while($row = $results->fetch(PDO::FETCH_ASSOC))
{
	 echo '<tr onclick="javascript:showRow(this);">' . 
    '<td>' . $row['type'] . '</td>' . 
    '<td>' . $row['quantity'] . '</td>' . 
	'</tr>';
} 


?>