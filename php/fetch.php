<?php
//Artworks of Scanhead   HNU 2017
include('db.class.php'); // call db.class.php
$mydb = new db(); // create a new object, class db()

$conn = $mydb->connect();

if(isset($_POST["query"]))
{

$q = $_POST["query"];
	
$results = $conn->prepare("SELECT * FROM add_employees WHERE fname LIKE '%" . $q . "%'
OR lname LIKE '%".$q."%'
OR EXT LIKE '%".$q."%'

");


}
else
{
 
 $results = $conn->prepare("SELECT * FROM add_employees ");

}

$results->execute();
while($row = $results->fetch(PDO::FETCH_ASSOC))
{
	 echo '<tr onclick="javascript:showRow(this);">' . 
    '<td>' . $row['fname'] . '</td>' . 
    '<td>' . $row['lname'] . '</td>' . 
    '<td>' . $row['email'] . '</td>' .
	'<td>' . $row['description'] . '</td>' .
	'<td>' . $row['EXT'] . '</td>' .
	'</tr>';
} 


?>