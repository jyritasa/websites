<?php
  try {
    $conn = new PDO("mysql:host=".SERVERNANE.";dbname=".DBNAME, USERNAME, PASSWORD);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn_response = "success";
  }
  catch(PDOException $e) {
    $conn_response = "Connection failed: " . $e->getMessage();
    $conn = null;
  }
?>
