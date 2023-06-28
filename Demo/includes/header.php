<?php
$conn = mysqli_connect('localhost', 'root', '', 'tatto_blazers');

session_start();
if (!isset($_SESSION['id'])) {
  header('location:login.php');
} else {
  $user =  $_SESSION['username'];
  $id = $_SESSION['id'];
}
$sql = "SELECT * FROM `blazers_data` WHERE `id` = '$id'";
$query = mysqli_query($conn, $sql);
// $rows = mysqli_num_rows($query);
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">


  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.all.min.js"></script>

  <title>Web</title>
  <style>
    .error {
      color: red;
    }

    /* camera button */
    .camera-button {
      position: absolute;
      top: 86%;
      left: 55%;
      transform: translate(-50%, -50%);
      padding: 0;
      border: none;
      background-color: transparent;
      color: white;
      font-size: 24px;
      cursor: pointer;
    }
  </style>
</head>

<body class="page-body">

  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#">Tatto BlazeRs</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <?php while ($data = (mysqli_fetch_array($query))) { ?>
      
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="homepage.php">Home <span class="sr-only">(current)</span></a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="table.php">BlazeRs Data</a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="user-edit-copy.php?id=<?php echo $data['id'];?>">blazers profile Test</a>
          </li> -->
        </ul>
        <!-- user data show -->
          <div class="form-inline my-2 my-lg-0">
            <div class="dropdown">
              <button class="btn  text-white dropdown-toggle mr-2" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                <?php echo $data['name']; ?>
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="user_data.php?id=<?php echo $data['id'];?>">Profile Update</a>

                <a class="dropdown-item" type="button" data-toggle="modal" data-target="#logoutModal">Logout</a>
                <!-- Logout Button -->

              </div>
            </div>
            <img src="images/<?php echo $data['user_image']; ?>" class="rounded-circle mx-auto d-block" alt="" height="50px;" width="50px;">

          </div>
        <?php } ?>
      </div>
    </nav>
  </header>