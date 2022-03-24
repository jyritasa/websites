<script src="components/functions/catalog/catalog.js"></script>
<form class="search" method="post" name="searchForm">
  <label for="titleofmovie">Movie Title:</label><br>
  <input type="text" id="titleofmovie" name="titleofmovie" value="" oninput="formClick(this.form)"><br>
  <label for="moviegenre">Genre:</label><br>
  <select name="moviegenre" id="moviegenre" onchange="formClick(this.form)">
    <option value ="default" label=" "></option>
  </select><br>
  <label for="moviegenre">Language:</label><br>
  <select name="movielanguage" id="movielanguage" onchange="formClick(this.form)">
    <option value ="default" label=" "></option>
  </select><br>
  <label for="movierating">Rating:</label><br>
  <select name="movierating" id="movierating" onchange="formClick(this.form)">
    <option value ="default" label=" "></option>
  </select><br>
  <label for="movieyear">Year:</label><br>
  <input type="number" min="1900" max="2099" step="1" value="2006" id="movieyear" name="movieyear"><br>
  <label for="movieactor">Contains Actor:</label><br>
  <input type="text" id="movieactor" name="movieactor" value="" oninput="formClick(this.form)"><br>
</form>

<div class="rentpage">
  <div class="titleslist">
    <div class="titlescroll">
      <ul id="listoftitles">
      </ul>
    </div>
  </div>
  <div class="movie" id="moveInfoPage">
    <div class="title">
      <h1 id="movieTitle"></h1>
      <p id="demo"></p>
    </div>
    <div class="undertitle">
      <div class="genre">
        <p id="genreText"></p>
      </div>
      <div class="year">
        <p id="yearText"></p>
      </div>
      <div class="language">
        <p id="languageText"></p>
      </div>
      <div class="rating">
        <p id="ratingText"></p>
      </div>
    </div>
    <div class="description">
      <div class="descriptionheader">
        <h3 >Description:</h3>
      </div>
      <p id=descriptionText></p>
    </div>
    <div id="actors" class="actors">
    </div>
  </div>
</div>
