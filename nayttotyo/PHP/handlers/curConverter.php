<?php

//require heitetty ./pages/tehtava3.php

$post = $_POST;

if (isset($post['money']) && isset($post['cur1']) && isset($post['cur2'])){
// Tulostaa daten muodossa: Paiva.Kuukausi.Vuosi Tunti:Minuutti:Sekuntti Aikavyöhyke_koodi (CEST)
  echo 'Exchange Rate Update Timestamp: ' . date("d.m.Y H:i:s T", $exchangeRate['timestamp']) . '<br><br>';
  echo $post['money'] . ' ' . $post['cur1'] . ' = ' . exchange($post['cur1'], $post['cur2'], $post['money'], $exchangeRate) . ' ' . $post['cur2'];
}

 ?>
