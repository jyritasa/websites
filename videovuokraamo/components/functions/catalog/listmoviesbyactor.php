<?php
require "../logininfo.php";
$id = intval($_GET['q']);

$actorSql = "SELECT
f.title as title,
f.film_id as id
FROM film_actor fa
JOIN actor a ON fa.actor_id=a.actor_id
JOIN film f ON fa.film_id=f.film_id
WHERE a.actor_id='".$id."'";

//Creating connection
$conn = new mysqli(SERVERNANE, USERNAME, PASSWORD, DBNAME);

if($conn->connect_error) {
  exit('Could not connect' . mysqli_error($conn));
}
//first query and saving the result into array
$result = mysqli_query($conn,$actorSql);

//Initialize array variable.
$titles = array();

//Fetch into associative array.
while ( $row = $result->fetch_assoc())  {
  $titles[]=$row;
}

//encode and return array as JSON.
echo $titleJSON = json_encode($titles);

//closing connection
$conn->close();
?>
