<?php

require './PHP/func/incomeCalcFunc.php';

$post = $_POST;

if (isset($post['age']) && isset($post['income']) && isset($post['tax'])) {
  echo 'My age is ' . $post['age'] . '. I am suppose to make ' . $post['income'] . '€ per month. <br>My tax percentage is: ' . $post['tax'] . '%';
  echo '<br>';
  taxCalc($post['age'], $post['income'], $post['tax']);
}

 ?>
