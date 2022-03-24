<?php
header('Content-Type: application/json');
require "../logininfo.php";
$id = intval($_GET['q']);

$actorSql = "SELECT
CONCAT(a.first_name, ' ', a.last_name) as actor,
a.actor_id as actor_id
FROM film_actor fa
JOIN actor a ON fa.actor_id=a.actor_id
JOIN film f ON fa.film_id=f.film_id
WHERE f.film_id= '".$id."'";

//Creating connection
$conn = new mysqli(SERVERNANE, USERNAME, PASSWORD, DBNAME);

if($conn->connect_error) {
  exit('Could not connect' . mysqli_error($conn));
}

//make query and save result.
$result = mysqli_query($conn,$actorSql);

//Initialize array variable.
$movies = array();

//Fetch into associative array.
while ( $row = $result->fetch_assoc())  {
	$movies[]=$row;
}

//encode and return array as JSON.
echo $actorJSON = json_encode($movies);

$conn->close();
?>
