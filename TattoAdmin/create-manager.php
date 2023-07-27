<?php 
$conn= mysqli_connect('localhost','root','','tatto_blazers');

$select_role = "SELECT * FROM `roles` WHERE `id` = 2";
$sql = mysqli_query($conn,$select_role);

$select_menu = "SELECT * FROM `sidebar_menu`";
$sql_menu = mysqli_query($conn,$select_menu);

if (isset($_POST['submit'])) {  
  $menu_1 = isset($_POST['option1']) ? (array)$_POST['option1'] : [];
  $menu_2 = isset($_POST['option2']) ? (array)$_POST['option2'] : [];
  $menu_3 = isset($_POST['option3']) ? (array)$_POST['option3'] : [];
  $menu_4 = isset($_POST['option4']) ? (array)$_POST['option4'] : [];
  $menu_5 = isset($_POST['option5']) ? (array)$_POST['option5'] : [];
  $menu_6 = isset($_POST['option6']) ? (array)$_POST['option6'] : [];

    

  }

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>create-manager</title>
  </head>
  <body>
   
  <div class="container">
    
    <div class="row">
      <div class="col-4">
        <h3>left Menu</h3>
        <form id="checkboxForm" action="" method="post">
          <div>
            <input type="checkbox" id="" name="option1" value="1">
            <label for="option1">Profile</label>
          </div>
          <div>
          <input type="checkbox" id="" name="option2" value="2">

            <label for="option2">Settings</label>
          </div>
          <div>
          <input type="checkbox" id="" name="option3" value="3">
            <label for="option3">My Clients</label>
          </div>
          <div>
          <input type="checkbox" id="" name="option4" value="4">
            <label for="option3">User Data</label>
          </div>
          <div>
          <input type="checkbox" id="" name="option5" value="5">
            <label for="option3">Artists</label>
          </div>
          <div>
          <input type="checkbox" id="" name="option6" value="6">
            <label for="option3">Add products </label>
          </div>
          <div>
          </div>
          <button type="submit" name="submit">Submit</button>
        </form>
      </div>
   
      <!-- <div class="col-4">
        <form id="checkboxForm" action="" method="POST">
          <div>
            <input type="checkbox" id="option1" name="options[]" value="Option 1">
            <label for="option1">Option 1</label>
          </div>
          <div>
            <input type="checkbox" id="option2" name="options[]" value="Option 2">
            <label for="option2">Option 2</label>
          </div>
          <div>
            <input type="checkbox" id="option3" name="options[]" value="Option 3">
            <label for="option3">Option 3</label>
          </div>
      
          <button type="submit">Submit</button>
        </form>
      </div> -->
      <!-- <div class="col-4">
        <form id="checkboxForm" action="" method="POST">
          <div>
            <input type="checkbox" id="option1" name="options[]" value="Option 1">
            <label for="option1">Option 1</label>
          </div>
          <div>
            <input type="checkbox" id="option2" name="options[]" value="Option 2">
            <label for="option2">Option 2</label>
          </div>
          <div>
            <input type="checkbox" id="option3" name="options[]" value="Option 3">
            <label for="option3">Option 3</label>
          </div>
      
          <button type="submit">Submit</button>
        </form>
      </div> -->
    </div>
   
  </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
  </body>
</html>