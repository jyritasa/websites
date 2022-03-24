<?php
require "../logininfo.php";

$sql = "SELECT DISTINCT name FROM language;";

//Creating connection
$conn = new mysqli(SERVERNANE, USERNAME, PASSWORD, DBNAME);

if($conn->connect_error) {
  exit('Could not connect' . mysqli_error($conn));
}
//first query and saving the result into array
$result = mysqli_query($conn,$sql);

//Initialize array variable.
$titles = array();

//Fetch into associative array.
while ( $row = $result->fetch_assoc())  {
  $titles[]=$row;
}

//encode and return array as JSON.
echo $JSON = json_encode($titles);

//closing connection
$conn->close();
?>
