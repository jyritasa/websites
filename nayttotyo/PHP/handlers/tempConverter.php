<?php

require './PHP/func/tempConverterFunc.php';

$post = $_POST;

if (isset($post['temperatures']) && isset($post['baseUnit1']) && isset($post['baseUnit2'])) {
  tempPrint($post['temperatures'], $post['baseUnit1'], $post['baseUnit2']);
}

 ?>
