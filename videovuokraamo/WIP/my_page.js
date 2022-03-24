window.onload = function loadFunctions() {
  //fetchTitleList();
}

function fetchTitleList() {
  const inventoryHttp = new XMLHttpRequest();
  inventoryHttp.onload = function() {
    const titleJSON = JSON.parse(this.responseText);
    document.getElementById("inventorytable").innerHTML = "";

    let top_row = document.createElement("tr");
    top_row.setAttribute("id", "topinventory");
    document.getElementById("inventorytable").appendChild(top_row);

    let top_id_td = document.createElement("td");
    let top_id_tdText = document.createTextNode("ID");
    top_id_td.appendChild(top_id_tdText);
    document.getElementById("topinventory").appendChild(top_id_td);

    let top_title_td = document.createElement("td");
    let top_title_tdText = document.createTextNode("TITLE");
    top_title_td.appendChild(top_title_tdText);
    document.getElementById("topinventory").appendChild(top_title_td);

    let top_in_store_td = document.createElement("td");
    let top_in_store_tdText = document.createTextNode("IN INVENTORY");
    top_in_store_td.appendChild(top_in_store_tdText);
    document.getElementById("topinventory").appendChild(top_in_store_td);

    //create list of titles and attatch title ID to them.
    titleJSON.forEach((item) => {
      let row = document.createElement("tr");
      row.setAttribute("id", "titleId_" + item.id);
      document.getElementById("inventorytable").appendChild(row);

      let id_td = document.createElement("td");
      let id_tdText = document.createTextNode(item.id);
      id_td.appendChild(id_tdText);
      document.getElementById("titleId_" + item.id).appendChild(id_td);

      let title_td = document.createElement("td");
      let title_tdText = document.createTextNode(item.title);
      title_td.appendChild(title_tdText);
      document.getElementById("titleId_" + item.id).appendChild(title_td);

      let in_store_td = document.createElement("td");
      let in_store_tdText = document.createTextNode(item.in_store);
      in_store_td.appendChild(in_store_tdText);
      document.getElementById("titleId_" + item.id).appendChild(in_store_td);
    });
  }
  inventoryHttp.open("GET", "./components/functions/my_page/fetchinventory.php");
  inventoryHttp.send();
}

function fetchRentedTitles() {
  const rentedHttp = new XMLHttpRequest();
  rentedHttp.onload = function() {
    const titleJSON = JSON.parse(this.responseText);
    document.getElementById("rentedtable").innerHTML = "";

    let top_row = document.createElement("tr");
    top_row.setAttribute("id", "topinventory");
    document.getElementById("rentedtable").appendChild(top_row);

    let top_id_td = document.createElement("td");
    let top_id_tdText = document.createTextNode("ID");
    top_id_td.appendChild(top_id_tdText);
    document.getElementById("topinventory").appendChild(top_id_td);

    let top_title_td = document.createElement("td");
    let top_title_tdText = document.createTextNode("TITLE");
    top_title_td.appendChild(top_title_tdText);
    document.getElementById("topinventory").appendChild(top_title_td);

    let top_in_store_td = document.createElement("td");
    let top_in_store_tdText = document.createTextNode("IN INVENTORY");
    top_in_store_td.appendChild(top_in_store_tdText);
    document.getElementById("topinventory").appendChild(top_in_store_td);

    //create list of titles and attatch title ID to them.
    titleJSON.forEach((item) => {
      let row = document.createElement("tr");
      row.setAttribute("id", "titleId_" + item.id);
      document.getElementById("rentedtable").appendChild(row);

      let id_td = document.createElement("td");
      let id_tdText = document.createTextNode(item.id);
      id_td.appendChild(id_tdText);
      document.getElementById("titleId_" + item.id).appendChild(id_td);

      let title_td = document.createElement("td");
      let title_tdText = document.createTextNode(item.title);
      title_td.appendChild(title_tdText);
      document.getElementById("titleId_" + item.id).appendChild(title_td);

      let in_store_td = document.createElement("td");
      let in_store_tdText = document.createTextNode(item.in_store);
      in_store_td.appendChild(in_store_tdText);
      document.getElementById("titleId_" + item.id).appendChild(in_store_td);
    });
  }
  rentedHttp.open("GET", "./components/functions/my_page/fetchrentedmovies.php");
  rentedHttp.send();
}
