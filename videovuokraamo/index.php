<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Videovuokraamo</title>
  <link rel="stylesheet" href="styles/style.css">
  <link rel="icon" type="image/jpg" href="img/vhs.png">
</head>

<body>
  <header>
    <ul>
      <li><a href="?page=home">Home</a></li>
      <li><a href="?page=catalog">Catalog</a></li>
      <li><a href="?page=about">About</a></li>
      <li><a href="?page=my_page">My Page</a></li>
      <?php
      session_start();
      if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        echo '<li><a href="./components/functions/login/logout.php">Logout</a></li>';
       }
      else
      echo '<li><a href="?page=login">Login</a></li>';
       ?>
    </ul>
  </header>
  <article class="content">
    <div class="logotext">
      <img src="img/pumpkin.png" alt="Happy Halloween!" width="100">
      <p id="sitetitle">HALLOWEEN MOVIE RETAL</p>
    </div>
    <div class="pageContent">
      <?php
        if (isset($_GET['page'])){
          $pagename = 'pages/' . $_GET['page'] . '.php';
          if(file_exists($pagename)){
            require_once 'pages/' . $_GET['page'] . '.php';
          }
          else {
            require_once 'assortments/error.php';
          }
        }
        else {
          require_once 'pages/home.php';
      }
      ?>
    </div>
  </article>
  <footer>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
      irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
  </footer>
</body>

</html>
