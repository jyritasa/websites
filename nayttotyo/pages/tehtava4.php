<img class="bubble" src="images/bubble_teht4.png" alt="kupla" height="80"></div>
<div id="tehtava4" class="flex">
  <form  action="" method="post">
    <label>Please input temperatures seperated by a comma (,) and the base unit.</label>
    <div class="long">
      <input size="31" type="text" name="temperatures" value="" required>
      <select name="baseUnit1">
        <option value="C">Celsius</option>
        <option value="F">Farenheit</option>
        <option value="K">Kelvin</option>
      </select>
    </div>
    <div class="long">
      <label>Select base unit for conversion: </label>
        <select name="baseUnit2">
          <option value="C">Celsius</option>
          <option value="F">Farenheit</option>
          <option value="K">Kelvin</option>
        </select>
      </div>
      <input type="submit" name="submit" value="Average and Convert">
  </form>
  <div class="answerBox">
    <label>Answer:</label>
    <br>
    <?php require './PHP/handlers/tempConverter.php'; ?>
  </div>
</div>
<img class="rainbow" src="images/rainbow.png" alt="rainbow">
