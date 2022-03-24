<img class="bubble" src="images/bubble_teht2.png" alt="kupla" height="80"></div>
<div id="tehtava2" class="flex">
  <form action="" method="post">
    <label for="age">Age:</label><br>
    <input type="number" id="age" name="age" max="130" min="0" required><br>
    <label for="income">Untaxed income:</label><br>
    <input type="number" id="income" name="income"  min="0" required> € / Month <br>
    <label for="tax">Taxbracket:</label><br>
    <input type="number" id="tax" name="tax"  max="89"  min="0" required> % <br>
    <input type="submit" name="incomeCalc" value="Press"/>
    </form>
    <div class="answerBox">
    <label>Answer:</label>
    <br>
    <?php require './PHP/handlers/incomeCalc.php'; ?>
  </div>
</div>
<img class="rainbow" src="images/rainbow.png" alt="rainbow">
