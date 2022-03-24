<?php
/*
TYEL:
  17–52-vuotias: 7,15 %
  53–62-vuotias: 8,65 %
  63–67-vuotias: 7,15 %

Työttömyysvakuutus: 1,40%
*/

//Globaalit määrittelyt helppoa muutosta varten
define ('UNEMPLOYMENTINSURANCE', 0.014);
define ('TYELBRACKETONE', 0.0715);
define ('TYELBRACKETTWO', 0.0865);

//Määritellään TYEL veroprosentti iän mukaan.
function ageCheck(int $age){
  $tyel = TYELBRACKETTWO;

  if ($age < 17 || $age > 67) {
    $tyel = 0;
  }
  elseif ($age < 52 || $age > 62) {
    $tyel = TYELBRACKETONE;
  }
  return $tyel;
}

//Muuttaa veroprosentit arvoiksi laskuja varten. Palauttaa ne arrayna.
function taxationIsTheft(int $age, int $tax){
  return array(
    'unemployment' => UNEMPLOYMENTINSURANCE,
    'tyel' => ageCheck($age),
    'tax' =>  $tax / 100
  );
}

//Laskee verot ja nettotulon. Palauttaa tiedot arrayna.
function howMuchStolen(array $taxes, float $income){
  //lasketaan erikseen nettotuloa varten.
  $unemployment = round($income * $taxes['unemployment'],2);
  $tyel = round($income * $taxes['tyel'],2);
  $incomeTax = round($income * $taxes['tax'],2);

  return array(
    'unemployment' => $unemployment,
    'tyel' => $tyel,
    'tax' => $incomeTax,
    'netIncome' => $income - $unemployment - $tyel - $incomeTax
  );
}

//Tekee tulosteen:
function taxPrint(array $info){
  echo '<br>Here is my Tax breakdown: <br>';
  echo 'Unemployment Tax: ' . $info['unemployment'] .'€ <br>';
  echo 'TYEL Tax: ' . $info['tyel'] . '€ <br>';
  echo 'Income Tax: ' . $info['tax'] . '€ <br>';
  echo 'I am left with: '. $info['netIncome'] . '€ :(';
}

//yhdistetään kaikki että voidaan kutsua yhdellä kutsulla handlerissa.
function taxCalc(int $age, float $income, int $tax){
  //TaxationIsTheft laskee TYEL:in.
  //HowMuchStolen laskee maksettavat verot ja nettotulon
  //TaxPrint tekee tulosteen
  taxPrint(howMuchStolen(taxationIsTheft($age, $tax), $income));
}

?>
