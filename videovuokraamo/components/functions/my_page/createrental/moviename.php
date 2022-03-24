<?php
header('Content-Type: application/json');
require "../../logininfo.php";
$id = intval($_GET['movieid']);

$filmSql = "SELECT i.inventory_id AS id,
f.title AS title,
(SELECT inventory_in_stock(".$id.")) as in_stock,
f.rental_rate as rental_rate,
i.store_id as store
FROM inventory i
JOIN film f ON f.film_id = i.film_id
WHERE i.inventory_id = ".$id;

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
