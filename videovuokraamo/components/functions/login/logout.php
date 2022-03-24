<?php
  session_start();
  session_destroy();
  header( "Location: http://omena.winnova.fi/~A91578/videovuokraamo/?page=login");
?>
