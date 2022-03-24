<img class="bubble" src="images/bubble_teht1.png" alt="kupla" height="80"></div>

<div class="flex">
  <form action="" method="post">
    <label for="fname">First Name:</label><br>
    <!-- Katsoin netistä mikä olisi hyvä maksimi merkkimäärä nimille, 35 suositeltiin Stackoverflowissa. -->
    <input type="text" id="fname" name="fname" required maxlength="35"><br>
    <label for="lname">Last Name:</label><br>
    <input type="text" id="lname" name="lname" required maxlength="35"><br>
    <label for="bday">Birthday:</label><br>
    <input type="date" id="bday" name="bday" required>
    <input type="submit" name="ageCalc" value="Press"/>
  </form>
  <div class="answerBox">
    <label>Answer:</label>
    <br>
    <?php require './PHP/handlers/ageCalc.php'; ?>
  </div>
</div>

<img class="rainbow" src="images/rainbow.png" alt="rainbow">
