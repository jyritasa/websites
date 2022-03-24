<?php
require "../logininfo.php";
$movieValue = $_GET['movieValue'];
$genreValue = $_GET['genreValue'];
$yearValue = $_GET['yearValue'];
$languageValue = $_GET['languageValue'];
$actorValue = $_GET['actorValue'];
$ratingValue = $_GET['ratingValue'];

$filmSql = "SELECT DISTINCT f.film_id, f.title
FROM film f
JOIN film_category fc ON f.film_id=fc.film_id
JOIN category c ON fc.category_id=c.category_id
JOIN language l ON f.language_id = l.language_id
JOIN film_actor fa ON f.film_id = fa.film_id
JOIN actor a ON a.actor_id = fa.actor_id
WHERE ";

$info = array(
  array("f.rating", $ratingValue),
  array("f.title", $movieValue),
  array("c.name", $genreValue),
  array("f.release_year", $yearValue, ),
  array("l.name", $languageValue),
);

//bool flag for if the value being added is first on the list
//if no longer first, add "AND" between the query parameters.
$first = true;

//construct array for base values
for ($i=0; $i < count($info); $i++) {
  //Ignore empty and default values
  if ($info[$i][1] !== "default" && $info[$i][1] !== ""){
    if(!$first){
      $filmSql .= " AND ";
    }
    if($info[$i][0] == "f.rating"){
      $filmSql .= "{$info[$i][0]} = '{$info[$i][1]}' ";
      $first = false;
    }
    else {
      $filmSql .= "{$info[$i][0]} LIKE '%{$info[$i][1]}%' ";
      $first = false;
    }
  }
}

//Turn Actor input into array for first and last name.
$actorNames = explode(' ', $actorValue);

//Construct query for actors
if (count($actorNames) !== 0){
  //If there is only one name, apply for both first and last name.
  if (count($actorNames) == 1){
    if(!$first){
      $filmSql .= " AND (";
    }
    $filmSql .= "a.first_name LIKE '%{$actorNames[0]}%' OR
    a.last_name LIKE '%{$actorNames[0]}%'";
    if(!$first){
      $filmSql .= ")";
    }
  }
  //If there are two names, apply first and last name separately
  else {
    if(!$first){
      $filmSql .= " AND (";
    }
    $filmSql .= "a.first_name LIKE '%{$actorNames[0]}%' AND
    a.last_name LIKE '%{$actorNames[1]}%'";
    if(!$first){
      $filmSql .= ")";
    }
  }
}

//order list alphabetically
$filmSql .= " ORDER BY f.title;";

  // Create connection
  $conn = new mysqli(SERVERNANE, USERNAME, PASSWORD, DBNAME);
  if($conn->connect_error) {
    exit('Could not connect' . mysqli_error($conn));
  }

  //put result into variable.
  $result = mysqli_query($conn,$filmSql);

  //Initialize array variable.
  $titles = array();

  //Fetch into associative array.
  while ( $row = $result->fetch_assoc())  {
  	$titles[]=$row;
  }

  //encode and return array as JSON.
  echo $json = json_encode($titles);

  $conn->close();
 ?>
