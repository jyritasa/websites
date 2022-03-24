<?php
require "../logininfo.php";

  // Create connection
  $conn = new mysqli(SERVERNANE, USERNAME, PASSWORD, DBNAME);
  if($conn->connect_error) {
    exit('Could not connect' . mysqli_error($conn));
  }

  $sql = "SELECT r.rental_id,
          f.title AS title,
          r.rental_date,
          CONCAT(c.first_name, ' ', c.last_name) AS Customer,
          c.email,
          s.staff_id,
          CONCAT(s.first_name, ' ', s.last_name) as Employee
          FROM rental r
          JOIN inventory i ON i.inventory_id = r.inventory_id
          JOIN customer c ON c.customer_id = r.customer_id
          JOIN staff s ON s.staff_id = r.staff_id
          JOIN film f ON f.film_id = i.film_id
          WHERE return_date IS NULL
          ORDER BY rental_date;";

  $result = mysqli_query($conn,$sql);

  //Initialize array variable.
  $rentedmovies = array();

  //Fetch into associative array.
  while ( $row = $result->fetch_assoc())  {
  	$rentedmovies[]=$row;
  }

  //encode and return array as JSON.
  echo $inventoryJSON = json_encode($rentedmovies);

  $conn->close();
 ?>
