<?php
require "../logininfo.php";

  // Create connection
  $conn = new mysqli(SERVERNANE, USERNAME, PASSWORD, DBNAME);
  if($conn->connect_error) {
    exit('Could not connect' . mysqli_error($conn));
  }

  $sql = "SELECT film_id, title FROM film";

  $result = mysqli_query($conn,$sql);

  //Initialize array variable.
  $titles = array();

  //Fetch into associative array.
  while ( $row = $result->fetch_assoc())  {
  	$titles[]=$row;
  }

  //encode and return array as JSON.
  echo $titleJSON = json_encode($titles);

  $conn->close();
 ?>
