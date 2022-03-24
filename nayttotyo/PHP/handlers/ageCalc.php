<?php

require './PHP/func/ageCalcFunc.php';

$post = $_POST;

if (isset($post['fname']) && isset($post['lname']) && isset($post['bday'])){
  agePrint($post['fname'], $post['lname'], $post['bday']);
}

?>
