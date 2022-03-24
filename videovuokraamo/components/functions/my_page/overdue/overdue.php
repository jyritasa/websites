<?php
require "../../logininfo.php";

  // Create connection
  $conn = new mysqli(SERVERNANE, USERNAME, PASSWORD, DBNAME);
  if($conn->connect_error) {
    exit('Could not connect' . mysqli_error($conn));
  }

  $sql = "SELECT  rental.rental_id AS id,
	CONCAT(customer.last_name, ', ', customer.first_name) AS customer,
           address.phone, film.title
           FROM rental INNER JOIN customer ON rental.customer_id = customer.customer_id
           INNER JOIN address ON customer.address_id = address.address_id
           INNER JOIN inventory ON rental.inventory_id = inventory.inventory_id
           INNER JOIN film ON inventory.film_id = film.film_id
           WHERE rental.return_date IS NULL
           AND rental_date + INTERVAL film.rental_duration DAY < CURRENT_DATE()
           ORDER BY rental.rental_id;";

  $result = mysqli_query($conn,$sql);

  //Initialize array variable.
  $overdue = array();

  //Fetch into associative array.
  while ( $row = $result->fetch_assoc())  {
  	$overdue[]=$row;
  }

  //encode and return array as JSON.
  echo $inventoryJSON = json_encode($overdue);

  $conn->close();
 ?>
