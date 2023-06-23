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
  // echo $id;
}
$sql = "SELECT * FROM `blazers_data` WHERE `id` = '$id'";
$query = mysqli_query($conn,$sql);
$rows = mysqli_num_rows($query);
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
      #updatebtn
      {
        margin-left:86px;
      }
    </style>
    <title>User_Data</title>
  </head>
  <body>
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
        <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="#">Artists</a>    
        </li>
        <li class="nav-item">
        <a class="nav-link" href="#">Book Your Session</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="#">Tatto</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="update-password.php">Change Password</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="table.php">blazers Data</a>
        </li>
        </ul>

    <div class="form-inline my-2 my-lg-0">
<?php while($data=(mysqli_fetch_array($query))) { ?>
  <div class="dropdown">
  <button class="btn  text-white dropdown-toggle mr-2" type="button" id="dropdownMenuButton" data-toggle="dropdown">
  <?php echo $data['name'];?>
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <!-- <a class="dropdown-item" href="#">Another action</a> -->
    <!-- <a class="dropdown-item" href="logout.php">Logout</a> -->
    <a class="dropdown-item" type="button" data-toggle="modal" data-target="#exampleModalCenter">Logout</a>
  </div>
</div>
      
     <img src="images/<?php echo $data['user_image'];?>" class="rounded-circle mx-auto d-block" alt="" height="50px;" width="50px;" >
      </div>
  </div>
</nav>
  </header>
  <!-- user data -->
    <div class="container my-5 shadow-lg p-3 mb-5 bg-white rounded">
    <div class="row">
        <div class="col-6">
        <img src="images/<?php echo $data['user_image'];?>" class="rounded-circle mx-auto d-block" alt="" height="200px;" width="200px;" >
        <h5 class="text-center"><?php  echo $data['name']; ?></h5>
    </div>
            <div class="col-6">
                      <form action="update-action.php" method="post">
                  <div class="row my-4">
                    <div class="col">
                        <input type="text" class="form-control" name="name" value="<?php echo $data['name'];?>" required>
                    </div>
                    <div class="col"> 
                        <input type="Email" class="form-control"  name="email" value="<?php  echo $data['email'];?>" pattern=".+@gmail\.com" size="30" required>
                        
                    </div>
                  </div>
                  <div class="row my-2">
                      <div class="col">
                          <input type="text" class="form-control" name="address" value="<?php  echo $data['address'];?>" required>
                      </div>
                      <div class="col">
                          <input type="text" class="form-control" name="phone_number" value="<?php echo  $data['contact'];?> " maxlength="10" required>
                      </div>
            </div>
            <div class="row">
              <div class="col-6">
              <input type="file" class="form-control" name="image">
              </div>
              <div class="col-6">
            <button type="submit" name="submit" class="btn btn-md btn-primary center" id="updatebtn"> submit</button>
              </div>
                  </form>
            </div>
            </div>
          
      </div>
    </div>
    </div>
    <?php } ?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--"
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->

    <!-- Footer -->
<footer class="bg-dark text-center text-white">
  <!-- Grid container -->
  <div class="container p-4">
    <!-- Section: Social media -->
    <section class="mb-4">
      <!-- Facebook -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-facebook-f"></i
      ></a>

      <!-- Twitter -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-twitter"></i
      ></a>

      <!-- Google -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-google"></i
      ></a>

      <!-- Instagram -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-instagram"></i
      ></a>

      <!-- Linkedin -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-linkedin-in"></i
      ></a>

      <!-- Github -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-github"></i
      ></a>
    </section>
    <!-- Section: Social media -->

    <!-- Section: Form -->
    <section class="">
      <form action="">
        <!--Grid row-->
        <div class="row d-flex justify-content-center">
          <!--Grid column-->
          <div class="col-auto">
            <p class="pt-2">
              <strong>Upgrade to premium</strong>
            </p>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-md-5 col-12">
            <!-- Email input -->
            <div class="form-outline form-white mb-4">
              <input type="email" id="form5Example21" class="form-control" />
              <label class="form-label" for="form5Example21">Email address</label>
            </div>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-auto">
            <!-- Submit button -->
            <button type="submit" class="btn btn-outline-light mb-4">
              Subscribe
            </button>
          </div>
          <!--Grid column-->
        </div>
        <!--Grid row-->
      </form>
    </section>
    <!-- Section: Form -->

    <!-- Section: Text -->
    <section class="mb-4">
      <p>
      A tattoo studio that's not just about tattoos but more about the experience and the connection. We believe in elevating lives through art and creativity. We are a team of award winning tattoo artists and designers who would love to serve you with the best of custom tattoos designed based on your values and beliefs. Aliens tattoo is the brand people trust, we are recognised as one of the best tattoo studio in Mumbai / India.
      </p>
    </section>
    <!-- Section: Text -->   
  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2023 Copyright:
    <a class="text-white" href="https://mdbootstrap.com/">Tatto BlazeRs</a>
  </div>
  <!-- Copyright -->
  <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-dark" id="exampleModalCenterTitle" >Are You sure you want to logout?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-danger">
      Logging out helps prevent other users from accessing the system without verifying their credentials. It also helps protect the current user’s access or prevent unauthorized actions on the current login session and is thus an important part of security. Logging out ensures that user access and user credentials are safe after the login session.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       <a href="logout.php"> <button type="button" class="btn btn-primary">Logout</button></a>
      </div>
    </div>
  </div>
</div>
</footer>

<!-- Footer -->
  </body>
</html>  