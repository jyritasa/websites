var canRentMovie = false;
var canRentCustomer = false;

function idToName(id, location) {
  const titlesByActorHttp = new XMLHttpRequest();
  titlesByActorHttp.onload = function() {
    const response = JSON.parse(this.responseText);
    document.getElementById(location).innerHTML = response.title;
    if(location == "moviename"){
      document.getElementById("movieInStock").innerHTML = "Movie in Stock: " + (response.in_stock == 1 ? "Yes" : "No");
      document.getElementById("rentalRate").innerHTML = response.rental_rate + "€";

      (response.in_stock == 1 ? canRentMovie = true : canRentMovie = false);
    }
    else{
      document.getElementById("customerbalance").innerHTML = "Customer Balance: " + response.customer_balance + "€";
      (response.customer_balance == "0.00" ? canRentCustomer = true : canRentCustomer = false);
    }
  };
  getid = location.slice(0,-4);
  titlesByActorHttp.open("GET", "./components/functions/my_page/createrental/" + location + ".php?"+ getid + "id=" + id);
  titlesByActorHttp.send();
}

function rentalClick(e, id){
  let customer = e.renterID.value;
  let movie = e.movieID.value;
  let employee = id;

  if(canRentMovie && canRentCustomer
    && customer !== ""
    && movie !== ""){
    let postRequest = new XMLHttpRequest();
    postRequest.open("POST", "./components/functions/my_page/createrental/createrental.php");
    postRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    postRequest.onload = function() {
      document.getElementById("rentalResponse").innerHTML = postRequest.responseText;
    }

    postRequest.send("customer=" + customer + "&movie=" + movie + "&employee=" + employee);
    document.getElementById("rentalResponse").innerHTML = "Processing..."
    e.renterID.value = "";
    e.movieID.value = "";
    document.getElementById("customerName").innerHTML = "";
    document.getElementById("customerbalance").innerHTML = "";
    document.getElementById("movieName").innerHTML = "";
    document.getElementById("rentalRate").innerHTML = "";
    document.getElementById("movieInStock").innerHTML =  "";
  }
  else{
    document.getElementById("rentalResponse").innerHTML = "Can't Rent!"
  }
}
