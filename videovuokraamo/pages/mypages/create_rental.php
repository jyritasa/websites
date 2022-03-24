<form class="rentalform">
  <label for="renterID">Renter ID: </label>
  <input type="text" name="renterID" id="renterID" value="" oninput="idToName(renterID.value, 'customername')" size="2">
  <p id="customername"></p>
  <p id="customerbalance"></p><br>
  <label for="movieID">Movie ID: </label>
  <input type="text" name="movieID" id="movieID" value="" oninput="idToName(movieID.value, 'moviename')" size="2">
  <p id="moviename"></p>
  <p id="rentalRate"></p>
  <p id="movieInStock"></p><br>
  <input type="button" value="Create Rental" onClick="rentalClick(this.form, <?php echo $_SESSION['staff_id']; ?>)"><br>
</form>
<p id="rentalResponse"><p>

<script src="./components/functions/my_page/createrental/create_rental.js"></script>
