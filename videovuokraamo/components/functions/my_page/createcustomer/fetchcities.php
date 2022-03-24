<?php
require "../../logininfo.php";
$country_id = intval($_GET['country_id']);

$sql = "SELECT ci.city_id,
ci.city
FROM city ci
JOIN country co ON co.country_id = ci.country_id
WHERE co.country_id = {$country_id}";

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
