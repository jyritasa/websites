<?php

//Muuttaa inputin Arrayksi ja palauttaa arrayn jossa on vain numerot
function averageTemp(string $temps){
  //Siirretään Stringgi arrayhin.
  $tempsArray = explode(',', $temps);

  //Tarkistetaan että arvot on numeroita.
  $tempsArray = array_filter($tempsArray,
    function($a){
      return is_numeric($a);
    }
  );

  //Sen varalta että mitään lukuja ei syötetty
  if(count($tempsArray) > 0){
    return array_sum($tempsArray) / count($tempsArray);
  }
}

//Muuttaa ja palauttaa annetun lämpötilan Celsiukseksina
function convertToC(string $temps, string $baseUnit1){
  $avgTemp = averageTemp($temps);
  switch ($baseUnit1) {
    case 'C':
      $cTemp = $avgTemp;
      break;

    case 'F':
      $cTemp = ($avgTemp - 32)/1.8;
      break;

    case 'K':
      $cTemp = $avgTemp - 273.15;
      break;
  }
  return $cTemp;
}

//Muuttaa lämpötilan.
function convertTemps(string $temps, string $baseUnit1, string $baseUnit2){
  //muuttaa lämpötilan Celsiukseksi laskemisen määrän vähentämistä varten.
  $cTemp = convertToC($temps, $baseUnit1);
  switch ($baseUnit2) {
    case 'C':
      $conTemp = $cTemp;
      break;

    case 'F':
      $conTemp = $cTemp * 1.8 + 32;
      break;

    case 'K':
      $conTemp = $cTemp + 273.15;
      break;
  }
    return $conTemp;
}

//Tulostin sitä varten jos käyttäjä ei ole syöttänyt numeroita ollenkaan.
function tempPrint(string $temperatures, string $baseUnit1 , string $baseUnit2){
  $printTemp = convertTemps($temperatures, $baseUnit1, $baseUnit2);
  if (is_null($printTemp)) {
    echo 'Please input temperatures seperated by a comma (,)<br>';
    echo 'For example: 1,6,5,4';
  }
  else {
    echo 'You want to convert average of ' . $temperatures . '°' . $baseUnit1 . ' to °' . $baseUnit2;
    echo '<br><br>';
    echo 'Averaged Converted temperature is: ' . $printTemp . ' °' . $baseUnit2;
  }
}
 ?>
