<?php
include 'config.php';
include 'links.php';

session_start();
if (!isset($_SESSION['id'])) {
  header('location:login.php');
}

include 'sql-queries.php';
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- bootstrap css -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- common css -->
  <link rel="stylesheet" href="common.css">
  <title>Web</title>

</head>

<body class="page-body">
  <header>
    <nav class="navbar navbar-expand-lg navbar-secondary bg-secondary">
      <a class="navbar-brand text-white" href="#">Tatto BlazeRs</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <?php while ($data = (mysqli_fetch_array($query))) { ?>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link text-white" href="homepage.php">Home <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item">
              <a class="nav-link text-white" href="table.php">BlazeRs Data</a>
            </li>

          </ul>
          <!-- user data show -->
          <div class="form-inline my-2 my-lg-0">
            <div class="dropdown">
              <button class="btn  text-white dropdown-toggle mr-2" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                <?php echo $data['name']; ?>
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="user_data.php?id=<?php echo $data['id']; ?>">Profile Update</a>

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