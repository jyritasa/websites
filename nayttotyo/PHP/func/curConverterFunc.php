<?php
//Hakee ja palauttaa päivän valuuttakurssit
function exchangeRate(){
  //Käytetään ilmaista valuuttakurssi API:ta joka päivittää kurssit noin joka tunti (ilmais versiossa) ja palauttaa sen JSON tiedostona.
  //Ilmais versio antaa tehdä vain 1000 hakua per kuukausi.
  //Tämä linkki käyttää Dollaria päävaluuttana (ei muita päävaluuttoja ilmais versiossa).

  //Uuden kurssien haku on kommentoitu pois:
  /*
  $file = file_get_contents('https://openexchangerates.org/api/latest.json?app_id=75afabe61e714054a9af5fa406ebbe61');
  file_put_contents('./data/rates.json', $file);
  */

  //TO DO:
  // - Funktio joka vertailee rates.json:n luontia tämän hetkiseen aikaan.
  //   jos tiedosto on vanha se hakee uudet kurssit ja päivittää rate.jsonin.

  //luetaan rates.json muuttujaan.
  $file = file_get_contents('./data/rates.json');

  //Palautetaan Arrayna (Ilman true:ta se palauttaa stringgina)
  return json_decode($file, true);
}
//Muutetaan annettu rahan määrä Dollareiksi ja palauttaa sen.
function toDollar(string $cur2, float $amount, array $exchangeRate){
  if ($cur2 == 'USD') {
    $exAmmount = $amount;
  }
  else {
    $exAmmount = $amount * $exchangeRate['rates'][$cur2];
  }
  return $exAmmount;
}

//Muuttaa valuutan toiseksi valuutaksi ja palauttaa muunnoksen.
function exchange(string $cur1, string $cur2, float $amount, array $exchangeRate){
  //Muutetaan eka rahan määrä dollareiksi että voimme käsitellä yhdellä funktiolla muunnoksen.
  $dollar = toDollar($cur2, $amount, $exchangeRate);
  if ($cur1 == 'USD') {
    $exAmmount = $dollar;
  }
  else {
    $exAmmount = $dollar / $exchangeRate['rates'][$cur1];
  }
  return round($exAmmount,2);
}

//Hakee ja tulostaa kaikki valuutta vaihtoehdot JSONista formin selecteille.
function curOptions(array $exchangeRate){
  //Hakee array avaimet (JSON formaatti on array[rates][valuutan nimi])
  $keys = array_keys($exchangeRate);
  for ($i=0; $i < count($keys); $i++) {
    echo '<option value= '. $keys[$i] . '>' . $keys[$i] . '</option>';
  }
}

 ?>
