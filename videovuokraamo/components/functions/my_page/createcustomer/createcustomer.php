<?php
require "../../logininfo.php";
session_start();
$address = $_POST['address'];
$district = $_POST['district'];
$city_id = $_POST['city_id'];
$postal_code = $_POST['postal_code'];
$phone = $_POST['phone'];
$store_id = $_SESSION['staff_id']; //Store_id = staff_id as there are only two stores and each has single employee
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];

$conn = new mysqli(SERVERNANE, USERNAME, PASSWORD, DBNAME);

$sql = "INSERT INTO address (address, district, city_id, postal_code, phone)
VALUES ('{$address}', '{$district}', '{$city_id}', '{$postal_code}', '{$phone}');";

$sql .= "SET @address_id =  (select address_id from address order by address_id DESC limit 1);
SELECT @address_id;";

$sql .= "INSERT INTO customer (store_id, first_name, last_name, email, address_id, create_date)
VALUES ({$store_id}, '{$first_name}', '{$last_name}', '{$email}', @address_id, NOW());";

if (mysqli_multi_query($conn, $sql)) {
  $conn2 = new mysqli(SERVERNANE, USERNAME, PASSWORD, DBNAME);
  $customeridquery = "select customer_id FROM customer order by customer_id DESC limit 1;";
  $result = mysqli_query($conn2, $customeridquery);
  $customer_id = mysqli_fetch_array($result, MYSQLI_NUM);
  mysqli_close($conn2);
  echo "Customer {$customer_id[0]} Created Successfully! ";
} else {
  echo "Error updating record: " . mysqli_error($conn);
}
mysqli_close($conn);
