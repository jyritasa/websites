<?php
require "../../logininfo.php";
$customer = $_POST['customer'];
$movie = $_POST['movie'];
$employee = $_POST['employee'];
$conn = new mysqli(SERVERNANE, USERNAME, PASSWORD, DBNAME);

$sql = "INSERT INTO rental(rental_date, inventory_id, customer_id, staff_id)
VALUES(NOW(), {$movie}, {$customer}, {$employee});";

$sql .= "SET @rentID = LAST_INSERT_ID(), @balance = get_customer_balance({$customer}, NOW());";

$sql .= "INSERT INTO payment (customer_id, staff_id, rental_id, amount,  payment_date)
VALUES({$customer}, {$employee}, @rentID, @balance, NOW());";

if (mysqli_multi_query($conn, $sql)) {
  $conn2 = new mysqli(SERVERNANE, USERNAME, PASSWORD, DBNAME);
  $rentalIdQuery = "select rental_id from rental where customer_id = {$customer} order by rental_date DESC limit 1;";
  $result = mysqli_query($conn2, $rentalIdQuery);
  $rentalId = mysqli_fetch_array($result, MYSQLI_NUM);
  mysqli_close($conn2);
  echo "Rental {$rentalId[0]} Created Successfully! ";
} else {
  echo "Error updating record: " . mysqli_error($conn);
}
mysqli_close($conn);
