<?php
require "../../logininfo.php";

  // Create connection
  $conn = new mysqli(SERVERNANE, USERNAME, PASSWORD, DBNAME);
  if($conn->connect_error) {
    exit('Could not connect' . mysqli_error($conn));
  }

  $sql = "SELECT i.film_id AS id,
          f.title AS title,
          COUNT(*) AS in_store
          FROM inventory i
          JOIN film f ON f.film_id=i.film_id
          WHERE store_id = 1
          GROUP BY i.film_id;";

  $result = mysqli_query($conn,$sql);

  //Initialize array variable.
  $inventory = array();

  //Fetch into associative array.
  while ( $row = $result->fetch_assoc())  {
  	$inventory[]=$row;
  }

  //encode and return array as JSON.
  echo $inventoryJSON = json_encode($inventory);

  $conn->close();
 ?>
