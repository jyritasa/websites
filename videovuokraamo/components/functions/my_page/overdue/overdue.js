function fetchoverduelist() {
  const overdueHttp = new XMLHttpRequest();
  overdueHttp.onload = function() {
    const titleJSON = JSON.parse(this.responseText);
    document.getElementById("overduetable").innerHTML = "";

    let top_row = document.createElement("tr");
    top_row.setAttribute("id", "toprow");
    document.getElementById("overduetable").appendChild(top_row);

    let top_id_td = document.createElement("td");
    let top_id_tdText = document.createTextNode("ID");
    top_id_td.appendChild(top_id_tdText);
    document.getElementById("overduetable").appendChild(top_id_td);

    let top_customer_td = document.createElement("td");
    let top_customer_tdText = document.createTextNode("CUSTOMER");
    top_customer_td.appendChild(top_customer_tdText);
    document.getElementById("overduetable").appendChild(top_customer_td);

    let top_phone_td = document.createElement("td");
    let top_phone_tdText = document.createTextNode("PHONENUMBER");
    top_phone_td.appendChild(top_phone_tdText);
    document.getElementById("overduetable").appendChild(top_phone_td);

    let top_title_td = document.createElement("td");
    let top_title_tdText = document.createTextNode("MOVIE");
    top_title_td.appendChild(top_title_tdText);
    document.getElementById("overduetable").appendChild(top_title_td);

    //create list of titles and attatch title ID to them.
    titleJSON.forEach((item) => {
      let row = document.createElement("tr");
      row.setAttribute("id", "rentalId_" + item.id);
      document.getElementById("overduetable").appendChild(row);

      let id_td = document.createElement("td");
      let id_tdText = document.createTextNode(item.id);
      id_td.appendChild(id_tdText);
      document.getElementById("rentalId_" + item.id).appendChild(id_td);

      let customer_td = document.createElement("td");
      let customer_tdText = document.createTextNode(item.customer);
      customer_td.appendChild(customer_tdText);
      document.getElementById("rentalId_" + item.id).appendChild(customer_td);

      let phone_td = document.createElement("td");
      let phone_tdText = document.createTextNode(item.phone);
      phone_td.appendChild(phone_tdText);
      document.getElementById("rentalId_" + item.id).appendChild(phone_td);

      let title_td = document.createElement("td");
      let title_tdText = document.createTextNode(item.title);
      title_td.appendChild(title_tdText);
      document.getElementById("rentalId_" + item.id).appendChild(title_td);
    });
  }
  overdueHttp.open("GET", "./components/functions/my_page/overdue/overdue.php");
  overdueHttp.send();
}
