<h1>This is My Page</h1>

<?php
echo '<img src="data:image/png;base64,'.base64_encode( $_SESSION['picture'] ).'"/>';
echo "<p> Welcome ".$_SESSION['first_name'] . " ". $_SESSION['last_name']."!</p>";
?>
<div class="formcontainer">
  <div class="formbox">
    <?php require_once 'pages/mypages/create_customer.php'; ?>
  </div>
  <div class="formbox">
    <?php require_once 'pages/mypages/create_rental.php'; ?>
  </div>
</div>

<script src="./components/functions/my_page/overdue/overdue.js"></script>

<div class="refreshbutton">
  <input type="button" name="refresh" value="Refresh Overdue DVDs" onclick="fetchoverduelist()">
</div>

<div class="overduebox">
  <table class="overduetable" id="overduetable">
  </table>
</div>
