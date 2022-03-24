<form class="customercreation">
  <label for="customerFirstName">First Name</label><br>
  <input type="text" name="customerFirstName" id="customerFirstName" value=""><br>
  <label for="customerLastName">Last Name</label><br>
  <input type="text" name="customerLastName" id="customerLastName" value=""><br>
  <label for="customerEmail">Email</label><br>
  <input type="text" name="customerEmail" id="customerEmail" value=""><br>
  <label for="countryselect">Country:</label><br>
  <select name="countryselect" id="countryselect" onchange="fetchCities(this.value)">
    <option value ="default" label=" "></option>
  </select><br>
  <label for="cityselect">City:</label><br>
  <select name="cityselect" id="cityselect" onchange="">
    <option value ="default" label=" "></option>
  </select><br>
  <label for="customerPost">Postage Number:</label><br>
  <input type="text" name="customerPost" id="customerPost" value=""><br>
  <label for="customerDistrict">District:</label><br>
  <input type="text" name="customerDistrict" id="customerDistrict" value=""><br>
  <label for="customerAddress">Address:</label><br>
  <input type="text" name="customerAddress" id="customerAddress" value=""><br>
  <label for="customerPhone">Phonenumber:</label><br>
  <input type="text" name="customerPhone" id="customerPhone" value=""><br><br>
  <input type="button" value="Submit" onClick="customerFormClick(this.form)"><br>
  <p id="customerresponse"></p>
</form>

<script src="./components/functions/my_page/createcustomer/create_customer.js"></script>
