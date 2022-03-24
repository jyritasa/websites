<?php
  $psw = "password";
  $usr = "admin";
  include 'settings.php';
  include 'connection.php';

  $first_name = "";
  $last_name = "";
  $password_response = false;
  $login_resonse = false;

  $password_sql = "SELECT password FROM users WHERE username = ? LIMIT 1";
  $info_sql = "SELECT first_name, last_name FROM users WHERE username = ? LIMIT 1";

  $saltedPassword = SALT . $psw;
  $hashedPassword = password_hash($saltedPassword , PASSWORD_DEFAULT);
  if($conn != null){
    $stmt = $conn->prepare($password_sql);
    $stmt->execute([$usr]);
    $row = $stmt->fetch();

    if($row){
      $login_resonse = true;
      $fetchedPassword = $row['password'];
      if (password_verify($saltedPassword, $fetchedPassword))
      {
        $password_response = true;
        $stmt = $conn->prepare($info_sql);
        $stmt->execute([$usr]);
        $row = $stmt->fetch();
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
      }
    }
  }

  $response = array(
    "connection_response" => $conn_response,
    "login_response" => $login_resonse,
    "password_response" => $password_response,
    "last_name" => $last_name,
    "first_name" => $first_name
  );

  $conn = null;
  header('Content-Type: application/json');
  echo $JSON = json_encode($response);

?>
