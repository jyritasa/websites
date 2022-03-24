<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Näyttötyö</title>
    <link rel="icon" href="images/icon.png">
    <link rel="stylesheet" href="style/style.css">
  </head>
  <body>
    <img class="header" src="images/header.png" alt="header">
    <?php
      //Tämä div on sitä varten että saan samaan laatikkoon navirobon ja kuplan.
      //Tämän takia myös kaikissa muissa sivuissa kumppittelee divin lopetus tagi jolle ei oo aloitusta.
      echo '<div class="images">';
      require 'assortments/navi.php';
      if (isset($_GET['page'])){
        $pagename = 'pages/tehtava' . $_GET['page'] . '.php';
        if(file_exists($pagename)){
          require_once 'pages/tehtava' . $_GET['page'] . '.php';
        }
        else {
          require_once 'assortments/error.php';
        }
      }
      else {
        echo '<img class="bubble" src="images/bubble_hello.png" alt="kupla" height="80"></div>';
        echo '<img class="rainbow" src="images/rainbow.png" alt="rainbow">';
      }
    ?>
  <?php
    //Sain hienon vision footterille mutta en tiedä ehdinkö/jaksanko toteuttaa.
    require 'assortments/footer.php';
   ?>
  </body>
</html>
