<!doctype html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.all.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <style>
    .error {
      color: red;
    }
  </style>
  <title>Change password</title>
</head>

<body>

  <?php
  // error_reporting(0);
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
  $rows = mysqli_num_rows($query);
  if (!$query) {
    echo "data not found";
  } else {
    foreach ($query as $data) {
      $dbpassword = $data['password'];
    }
  }


  $matchingErr = "";
  $newpasswordErr = "";
  $cnewpasswordErr = "";
  $currpasswordErr = "";


  function sanitize_input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  // Assuming you have established a database connection

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $currentPassword = $_POST["current_password"];
    $newPassword = $_POST["new_password"];
    $confirmPassword = $_POST["confirm_password"];


    if (empty($_POST["current_password"])) {
      $currpasswordErr = "Password is required";
    }
    // Check if the current password is correct (you may need to retrieve the user's hashed password from the database)
    if (!password_verify($currentPassword, $dbpassword)) {
      $matchingErr = "old password did not matched";
      // exit;
    }

    // new password
    // if ($newPassword !== $confirmPassword) {
    //     echo "Error: New password and confirm password do not match.";
    // }

    if (empty($_POST["new_password"])) {
      $newpasswordErr = "Password is required";
    } else {
      $newPassword = (sanitize_input($_POST["new_password"]));
      // Check if password is strong (at least 8 characters, contains a lowercase letter, an uppercase letter, and a number)
      if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/", $newPassword)) {
        $newpasswordErr = "Password must be at least 8 characters long and contain at least one lowercase letter, one uppercase letter, and one number";
      }
    }

    if (empty($_POST['confirm_password'])) {
      $newpasswordErr = "password is required";
    } else {
      if ($_POST['new_password'] == $_POST['confirm_password']) {
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
      } else {
        $cnewpasswordErr = " password did not matched";
      }
    }

    if ($matchingErr == "" && $newpasswordErr == "" && $cnewpasswordErr == "") {
      $sql = "UPDATE blazers_data SET `password` = '$hashedPassword' WHERE `id` = '$id'";
      $queryUp = mysqli_query($conn, $sql);
      if (!$queryUp) {

        echo "<script>";
        echo " Swal.fire({
                    icon: 'error',
                    title: 'Failed',
                    text: password updation failed!',
                    showConfirmButton: false,
                    timer: 2500
                  }).then(() => {
                    window.location.href = ''update-password.php'';
                  })";
        echo "</script>";
      } else {

        echo "<script>";
        echo " Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Password Updated successfully!',
                    showConfirmButton: false,
                    timer: 2500
                  }).then(() => {
                    window.location.href = 'login.php';
                  })";
        echo "</script>";
      }
    }
  }
  ?>

  <div class="container">
    <div class="row my-3">
      <div class="col-6" style="margin-top: 165px;">
        <h3 class="text-center">Change Your Password</h3>

        <form action="" method="POST">
          <div class="form-group">
            <!-- old password -->
            <label for="exampleInputEmail1">Old Password</label>
            <div class="input-group">
              <input type="password" class="form-control" id="myInput" required name="current_password" aria-label="Example select with button addon" placeholder="old password here" maxlength="32" minlength="8">
              <div class="input-group-append">
                <button class="btn btn-secondary" type="button" onclick="myFunction()"><i class="fa fa-eye" aria-hidden="true"></i></button>
              </div>
            </div>
            <div class="row">
              <span class="error"><?php echo $matchingErr; ?></span>

              <span class="error"><?php echo $currpasswordErr; ?></span>
            </div>

            <!-- new password -->
            <label for="exampleInputEmail1">New Password</label>
            <div class="input-group">
              <input type="password" class="form-control" name="new_password" required id="myInput1" aria-label="Example select with button addon" placeholder="New password here" maxlength="32" minlength="8">
              <div class="input-group-append">
                <button class="btn btn-secondary" type="button" onclick="myFunction1()"><i class="fa fa-eye" aria-hidden="true"></i></button>
              </div>
            </div>
            <div class="row">
              <span class="error"><?php echo $newpasswordErr; ?></span>
            </div>

            <label for="exampleInputEmail1"> Confirm New Password</label>
            <div class="input-group">
              <input type="password" class="form-control" name="confirm_password" required id="myInput2" aria-label="Example select with button addon" placeholder=" Confirm New password here" maxlength="32" minlength="8">
              <div class="input-group-append">
                <button class="btn btn-secondary" type="button" onclick="myFunction2()"><i class="fa fa-eye" aria-hidden="true"></i></button>
              </div>
            </div>
            <div class="row">
              <span class="error"><?php echo $cnewpasswordErr; ?></span>
            </div>

            <input type="hidden" name="loginuser" id="" value="<?php echo $_SESSION['username']?>">

            <button class="btn btn-outline-danger btn-block mt-3" type="submit" name="submit"> Change Password </button>
          </div>
        </form>

        <!-- conform new password -->
      </div>

      <div class="col-6">
        <img src="https://images.unsplash.com/photo-1605858286629-4268180c482b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTB8fGtleSUyMGFuZCUyMGxvY2t8ZW58MHx8MHx8fDA%3D&auto=format&fit=crop&w=500&q=60" alt="">
      </div>
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


<script>
  function myFunction() {
    var x = document.getElementById("myInput");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }
</script>

<script>
  function myFunction1() {
    var x = document.getElementById("myInput1");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }
</script>

<script>
  function myFunction2() {
    var x = document.getElementById("myInput2");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }
</script>