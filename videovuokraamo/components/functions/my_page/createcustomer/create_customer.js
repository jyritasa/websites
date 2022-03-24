window.onload = function loadFunctions() {
  fetchCountries();
}

function fetchCountries() {
  const countryHttp = new XMLHttpRequest();
  countryHttp.onload = function() {
    const titleJSON = JSON.parse(this.responseText);
    document.getElementById("countryselect").innerHTML = "";
    let country = document.createElement("option");
    country.setAttribute("value", "default");
    country.setAttribute("label", " ");
    document.getElementById("countryselect").appendChild(country);
    //create list of titles and attatch title ID to them.
    titleJSON.forEach((item) => {
      let country = document.createElement("option");
      let countryText = document.createTextNode(item.country);
      country.setAttribute("value", item.country_id);
      country.appendChild(countryText);
      document.getElementById("countryselect").appendChild(country);
    });
  }
  countryHttp.open("GET", "./components/functions/my_page/createcustomer/fetchcountries.php");
  countryHttp.send();
}

function fetchCities(e) {
  if(e == "default"){
    document.getElementById("cityselect").innerHTML = "";
    let city = document.createElement("option");
    city.setAttribute("value", "default");
    city.setAttribute("label", " ");
  }
  const cityHttp = new XMLHttpRequest();
  cityHttp.onload = function() {
    const titleJSON = JSON.parse(this.responseText);
    document.getElementById("cityselect").innerHTML = "";
    let city = document.createElement("option");
    city.setAttribute("value", "default");
    city.setAttribute("label", " ");
    document.getElementById("cityselect").appendChild(city);
    //create list of titles and attatch title ID to them.
    titleJSON.forEach((item) => {
      let city = document.createElement("option");
      let cityText = document.createTextNode(item.city);
      city.setAttribute("value", item.city_id);
      city.appendChild(cityText);
      document.getElementById("cityselect").appendChild(city);
    });
  }
  cityHttp.open("GET", "./components/functions/my_page/createcustomer/fetchcities.php?country_id=" + e);
  cityHttp.send();
}

function customerFormClick(e){
  let first_name = e.customerFirstName.value;
  let last_name = e.customerLastName.value;
  let email = e.customerEmail.value;
  let city_id = e.cityselect.value;
  let postal_code = e.customerPost.value;
  let district = e.customerDistrict.value;
  let customerAddress = e.customerAddress.value;
  let phone = e.customerPhone.value;
  let address = e.customerAddress.value;

  const customerRequest = new XMLHttpRequest();
  customerRequest.open("POST", "./components/functions/my_page/createcustomer/createcustomer.php");
  customerRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  customerRequest.onload = function() {
    document.getElementById("customerresponse").innerHTML = customerRequest.responseText;
  }
    document.getElementById("customerresponse").innerHTML = "Processing..."
  customerRequest.send("first_name=" + first_name
  + "&last_name=" + last_name
  + "&city_id=" + city_id
  + "&customerAddress=" + customerAddress
  + "&postal_code=" + postal_code
  + "&district=" + district
  + "&address=" + address
  + "&phone=" + phone
  + "&email=" + email);
}
