//TODO: Make single function for fetch functions with paras of target ID
//      and GET URL to lessen code redundancy.

//Create new list of titles and show info of the first movie in the list.
window.onload = function loadFunctions() {
  fetchCategories();
  fetchTitleList();
  fetchRatings();
  fetchlanguages();
  titleClick(1);
}

function fetchTitleList() {
  const titlesHttp = new XMLHttpRequest();
  titlesHttp.onload = function() {
    const titleJSON = JSON.parse(this.responseText);
    document.getElementById("listoftitles").innerHTML = "";
    //create list of titles and attatch title ID to them.
    titleJSON.forEach((item) => {
      let title = document.createElement("li");
      let titleText = document.createTextNode(item.title);
      title.setAttribute("id", "nameOfMovie" + item.film_id);
      title.appendChild(titleText);
      document.getElementById("listoftitles").appendChild(title);
    });
  }
  titlesHttp.open("GET", "./components/functions/catalog/titlesfromdb.php");
  titlesHttp.send();
}

function fetchCategories() {
  const titlesHttp = new XMLHttpRequest();
  titlesHttp.onload = function() {
    const titleJSON = JSON.parse(this.responseText);
    document.getElementById("moviegenre").innerHTML = "";
    let title = document.createElement("option");
    title.setAttribute("value", "default");
    title.setAttribute("label", " ");
    document.getElementById("moviegenre").appendChild(title);
    //create list of titles and attatch title ID to them.
    titleJSON.forEach((item) => {
      let title = document.createElement("option");
      let titleText = document.createTextNode(item.name);
      title.setAttribute("value", item.name);
      title.appendChild(titleText);
      document.getElementById("moviegenre").appendChild(title);
    });
  }
  titlesHttp.open("GET", "./components/functions/catalog/getcategories.php");
  titlesHttp.send();
}

function fetchRatings() {
  const titlesHttp = new XMLHttpRequest();
  titlesHttp.onload = function() {
    const titleJSON = JSON.parse(this.responseText);
    document.getElementById("movierating").innerHTML = "";
    let title = document.createElement("option");
    title.setAttribute("value", "default");
    title.setAttribute("label", " ");
    document.getElementById("movierating").appendChild(title);
    //create list of titles and attatch title ID to them.
    titleJSON.forEach((item) => {
      let title = document.createElement("option");
      let titleText = document.createTextNode(item.rating);
      title.setAttribute("value", item.rating);
      title.appendChild(titleText);
      document.getElementById("movierating").appendChild(title);
    });
  }
  titlesHttp.open("GET", "./components/functions/catalog/getratings.php");
  titlesHttp.send();
}

function fetchlanguages() {
  const titlesHttp = new XMLHttpRequest();
  titlesHttp.onload = function() {
    const titleJSON = JSON.parse(this.responseText);
    document.getElementById("movielanguage").innerHTML = "";
    let title = document.createElement("option");
    title.setAttribute("value", "default");
    title.setAttribute("label", " ");
    document.getElementById("movielanguage").appendChild(title);
    //create list of titles and attatch title ID to them.
    titleJSON.forEach((item) => {
      let title = document.createElement("option");
      let titleText = document.createTextNode(item.name);
      title.setAttribute("value", item.name);
      title.appendChild(titleText);
      document.getElementById("movielanguage").appendChild(title);
    });
  }
  titlesHttp.open("GET", "./components/functions/catalog/getlanguages.php");
  titlesHttp.send();
}

function fetchTitlesByActor(e) {
  const titlesByActorHttp = new XMLHttpRequest();
  titlesByActorHttp.onload = function() {
    const titlesByActorJSON = JSON.parse(this.responseText);
    document.getElementById("listoftitles").innerHTML = "";
    titlesByActorJSON.forEach((item) => {
      let title = document.createElement("li");
      let titleText = document.createTextNode(item.title);
      title.setAttribute("id", "nameOfMovie" + item.id);
      title.appendChild(titleText);
      document.getElementById("listoftitles").appendChild(title);
    });
    document.getElementById("listoftitles").scrollTo(0,0);
  }
  titlesByActorHttp.open("GET", "./components/functions/catalog/listmoviesbyactor.php?q=" + e);
  titlesByActorHttp.send();
}

//Function for fetching movie information from db after clicking the title from list.
function titleClick(e) {
  //AJAX HTTP Requests
  const infoHttp = new XMLHttpRequest();

  infoHttp.onload = function() {
    if (this.status == 200) {
      //Getting movie title info and putting it into DOM.
      const infoJSON = JSON.parse(this.responseText);
      document.getElementById("movieTitle").innerHTML = infoJSON.title;
      document.getElementById("genreText").innerHTML = infoJSON.genre;
      document.getElementById("yearText").innerHTML = infoJSON.release_year;
      document.getElementById("descriptionText").innerHTML = infoJSON.description;
      document.getElementById("ratingText").innerHTML = infoJSON.rating;
      document.getElementById("languageText").innerHTML = infoJSON.language;

      //Fetching and creating list of Actors
      const actorHttp = new XMLHttpRequest();
      actorHttp.onload = function() {
        const actorJSON = JSON.parse(this.responseText, true);
        //Emptying list of actors for new list.
        document.getElementById("actors").innerHTML = "";
        //looping through JSON and creating new paragraph element for each actor.
        //and attatching ID to them.
        actorJSON.forEach((item) => {
          let actor = document.createElement("p")
          let actorText = document.createTextNode(item.actor);
          actor.setAttribute("id", "actor" + item.actor_id);
          actor.appendChild(actorText);
          document.getElementById("actors").appendChild(actor);
        });
      }
      //GET for Actors
      actorHttp.open("GET", "./components/functions/catalog/getlistofactors.php?q=" + e);
      actorHttp.send();
    }
  }
  //GET for movie information
  infoHttp.open("GET", "./components/functions/catalog/getmovieinfo.php?q=" + e);
  infoHttp.send();
}

//Function for searching movies.
function formClick(e) {
  let movieValue = e.titleofmovie.value;
  let genreValue = e.moviegenre.value;
  let yearValue = e.movieyear.value;
  let languageValue = e.movielanguage.value;
  let actorValue = e.movieactor.value;
  let ratingValue = e.movierating.value;

  const formHttp = new XMLHttpRequest();
  formHttp.onload = function() {
    const titleJSON = JSON.parse(this.responseText);
    //Emptying the list
    document.getElementById("listoftitles").innerHTML = "";
    //looping through JSON and creating new paragraph element for each actor.
    //and attatching ID to them.
    titleJSON.forEach((item) => {
      let title = document.createElement("li");
      let titleText = document.createTextNode(item.title);
      title.setAttribute("id", "nameOfMovie" + item.film_id);
      title.appendChild(titleText);
      document.getElementById("listoftitles").appendChild(title);
    });
    let firstMovie = document.getElementById("listoftitles").firstChild.id;
    let movieID = firstMovie.replace("nameOfMovie", "");
    titleClick(movieID);
    document.getElementById("listoftitles").scrollTo(0,0);
  }
  formHttp.open("GET", "./components/functions/catalog/searchform.php?movieValue=" +
    movieValue +
    "&genreValue=" + genreValue +
    "&yearValue=" + yearValue +
    "&ratingValue=" + ratingValue +
    "&languageValue=" + languageValue +
    "&actorValue=" + actorValue);
  formHttp.send();
}

//listeners for clicking movie titles and actors.
//TO DO: Fix IDs so I dont have to do this.
document.addEventListener('click', function(e) {
  if (e.target.id.includes("actor") &&
    !e.target.id.includes("actors") &&
    !e.target.id.includes("movieactor")) {
    actorID = e.target.id.replace("actor", "");
    fetchTitlesByActor(actorID);
  }
  if (e.target.id.includes("nameOfMovie") &&
    e.target.id.replace("nameOfMovie", "") != "s") {
    movieID = e.target.id.replace("nameOfMovie", "");
    titleClick(movieID);
  }
});

function test(){
  console.log("Clikety Click, my friend!");
}
