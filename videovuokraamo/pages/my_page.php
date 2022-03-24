<?php
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  require_once 'mypages/loggedin.php';
  exit;
}
require_once "./components/functions/logininfo.php";

require_once 'mypages/unlogged.php';
?>
