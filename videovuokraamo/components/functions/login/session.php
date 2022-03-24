<?php
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form
      $conn = new mysqli(SERVERNANE, USERNAME, PASSWORD, DBNAME);
      $myusername = $_POST['usrname'];
      $mypassword = $_POST['pswrd'];

      $sql = "SELECT staff_id, first_name, last_name, picture FROM staff WHERE email = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $count = mysqli_num_rows($result);

      // If result matched $myusername and $mypassword, table row must be 1 row

      if($count == 1) {
         $_SESSION['login_user'] = $myusername;
         $_SESSION['first_name'] = $row['first_name'];
         $_SESSION['last_name'] = $row['last_name'];
         $_SESSION['staff_id'] = $row['staff_id'];
         $_SESSION['picture'] = $row['picture'];
         $_SESSION["loggedin"] = true;
          header( "Location: http://omena.winnova.fi/~A91578/videovuokraamo/?page=my_page");

      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
