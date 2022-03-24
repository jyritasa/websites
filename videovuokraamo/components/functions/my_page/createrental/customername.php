<?php
header('Content-Type: application/json');
require "../../logininfo.php";
$id = intval($_GET['customerid']);

$filmSql = "SELECT CONCAT(first_name , ' ' , last_name , ' EMAIL: ' , email) as title, (SELECT get_customer_balance(" . $id . ", NOW())) AS customer_balance FROM customer WHERE customer_id = " . $id;

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
