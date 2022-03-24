<?php
  //exchangeRate on nyt 'globaali muuttuja' koko sivulla.
  require './PHP/func/curConverterFunc.php';
  $exchangeRate = exchangeRate();
 ?>

<img class="bubble" src="images/bubble_teht3.png" alt="kupla" height="80"></div>
<div id="tehtava3" class="flex">
  <form action="" method="post">
    <label>Amount of Money and Currency</label>
    <div class="long">
      <input type="number" name="money" min="0" step=".01" required>
      <select name="cur1">
        <?php
          //Hakee kaikki mahdolliset valuutta tyypit
          curOptions($exchangeRate['rates']);
        ?>
      </select>
    </div>
    <div class="long">
      <label>Exchange to Currency: </label>
      <select name="cur2">
        <?php
          //Hakee kaikki mahdolliset valuutta tyypit
          curOptions($exchangeRate['rates']);
        ?>
      </select>
    </div>
    <input type="submit" name="submit" value="Convert">
  </form>
  <div class="answerBox">
    <label>Answer:</label>
    <br>
    <?php require './PHP/handlers/curConverter.php'; ?>
  </div>
</div>
<img class="rainbow" src="images/rainbow.png" alt="rainbow">
