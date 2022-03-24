<?php
header('Content-Type: application/json');
require "../logininfo.php";
$id = intval($_GET['q']);

$filmSql = "SELECT f.film_id,
f.title,
f.description,
f.release_year,
f.rating,
c.name as genre,
l.name as language
FROM film f
JOIN film_category fc ON f.film_id=fc.film_id
JOIN category c ON fc.category_id=c.category_id
JOIN language l ON f.language_id = l.language_id
WHERE f.film_id = '".$id."'";

//Creating connection
$conn = new mysqli(SERVERNANE, USERNAME, PASSWORD, DBNAME);

if($conn->connect_error) {
  exit('Could not connect' . mysqli_error($conn));
}

$result = mysqli_query($conn,$filmSql); //Make query and save result.
$info = mysqli_fetch_array($result); //save result into a variable.
echo json_encode($info); //encode variable into JSON and return it.

//closing connection
$conn->close();
?>
