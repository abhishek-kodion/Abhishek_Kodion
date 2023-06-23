<?php 
$conn = mysqli_connect('localhost','root','','tatto_blazers');

session_start();
if(!isset($_SESSION['id']))
{
  header('location:login.php');
}
else
{
  $user =  $_SESSION['username'];
  $id = $_SESSION['id'];
}


$sql = "SELECT * FROM `blazers_data` WHERE `id` = '$id'";
$query = mysqli_query($conn,$sql);
$rows = mysqli_num_rows($query);

$sqlAll = "SELECT * FROM `blazers_data`";
$queryAll = mysqli_query($conn,$sqlAll);
$rows1 = mysqli_num_rows($queryAll);
// echo $rows1;
?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Data Table</title>
  </head>
  <body>

  <!-- navigation Bar -->
  <header>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Tatto BlazeRs</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
        <a class="nav-link" href="homepage.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="t">User Data</a>
        </li>
        </ul>

        <?php while($data=(mysqli_fetch_array($query))) { ?>
    <div class="form-inline my-2 my-lg-0">
      <div class="dropdown">
  <button class="btn  text-white dropdown-toggle mr-2" type="button" id="dropdownMenuButton" data-toggle="dropdown">
  <?php echo $data['name'];?>
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="user_data.php">Profile Update</a>
    <!-- <a class="dropdown-item" href="#">Another action</a> -->
    <a class="dropdown-item" type="button" data-toggle="modal" data-target="#logoutModal">Logout</a>
    <!-- Logout Button -->

  </div>
</div>
      <img src="images/<?php echo $data['user_image'];?>" class="rounded-circle mx-auto d-block" alt="" height="50px;" width="50px;">
</div>
<?php } ?>
  </div>
</nav>
  </header>

<div class="row mt-2">
    <a href="add_user.php"><button class="btn btn-warning text-white" style="margin-left: 1157px;">Add User</button></a>
</div>

  <!-- table  -->
  <div class="container text-center">
  <table class="table mt-2">
  <thead class="thead-dark">
    <tr>
      <!-- <th scope="col" >Sr No</th> -->
      <th scope="col" >User Image</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Address</th>
      <th scope="col">Contact</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php while($dataAll=(mysqli_fetch_array($queryAll))) { ?>
    <tr>
      <!-- <th scope="row">1</th> -->
      <td><img src="images/<?php echo $dataAll['user_image']; ?>" alt="" height="40px;" width="40px;" class="rounded-circle"></td>
      <td><?php  echo $dataAll['name'];?></td>
      <td><?php  echo $dataAll['email'];?></td>
      <td><?php  echo $dataAll['address'];?></td>
      <td><?php  echo $dataAll['contact'];?></td>
      <td>
      <a href="user-edit.php?id=<?php  echo $dataAll['id']; ?>"><button class="btn btn-primary">Edit</button></a>
      <a href="delete-user.php?id=<?php echo $dataAll['id'];?>"><button class="btn btn-danger" onclick="return confirmDelete()">Delete</button></a>
     </td>
    </tr>
    <?php } ?>
  </tbody>
</table>
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

<script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete this user?");
        }
</script>