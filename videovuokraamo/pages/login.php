<?php
  require_once "./components/functions/logininfo.php";
  require_once 'components/functions/login/session.php';
  if (isset($_GET['page'])){
    if ($_GET['page'] == 'login'){
      if(file_exists('pages/loginpage/loginform.php')){
        require_once 'pages/loginpage/loginform.php';
      }
      else {
        require_once 'assortments/error.php';
      }
    }
  }
?>
