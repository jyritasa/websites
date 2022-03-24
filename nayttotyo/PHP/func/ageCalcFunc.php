<?php
//Tarkistetaan onko käyttäjä tulevaisuudesta.
function futureCheck($bday){
  $birthdate = date_create($bday);
  $today     = date_create();
  return $birthdate > $today;
}

//Muuttaa stringgin päivämäärä arvoksi ja laskee niiden eron, palauttaa vuosina.
function getAge($bday) {
  $birthdate = date_create($bday);
  $today     = date_create();
  $interval  = date_diff($birthdate, $today);
  return $interval->format('%y');
}

//Riippuen onko käyttäjä Jani, tulevaisuudesta vai menneisyydestä, hänelle tarjotaan eri printti.
function agePrint($fname, $lname, $bday){
  if (futureCheck($bday)) {
    echo 'Hello ' . ucfirst($fname) . ' ' . ucfirst($lname)  . '! You were born ' . date("d.m.Y", strtotime($bday)) . '. So,' . " you're from the future. Cool!";
  }
  else {
    echo 'Hello ' . ucfirst($fname) . ' ' . ucfirst($lname)  . '! You were born ' . date("d.m.Y", strtotime($bday)) . '. So, ' . "You're " . getAge($bday) . ' Years old.';
    //Easter Egg
    if (ucfirst($fname) == 'Jani' && ucfirst($lname) == 'Suista') {
      echo '<br>Let us hope that Lukko wins the Championship! :)';
    }
  }
}
?>
