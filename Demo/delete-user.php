<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.all.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <title>Delete</title>
</head>

<body>




  <?php
  $conn = mysqli_connect('localhost', 'root', '', 'tatto_blazers');

  if (isset($_POST['yes'])) {
    $userId = $_POST['yes'];
  }

  // $del = "DELETE FROM `blazers_data` WHERE `id`='$userId'";
  // $run = mysqli_query($conn,$del);

  $del = "UPDATE `blazers_data` SET `status` ='1' WHERE `id`='$userId'";
  $run = mysqli_query($conn, $del);

  if (!$run) {
    //  echo ("<script LANGUAGE='JavaScript'>
    // window.alert('Something went wrong please try again');
    // window.location.href='table.php';
    // </script>");

    echo "<script>";
    echo " Swal.fire({
        icon: 'error',
        title: 'Success',
        text: 'Something went wrong!',
        showConfirmButton: false,
        timer: 2500
        }).then(() => {
        window.location.href = 'table.php';
        })";
    echo "</script>";
  } else {
    // echo ("<script LANGUAGE='JavaScript'>
    // window.alert('user Deleted Successfully');
    // window.location.href='table.php';
    // </script>");

    echo "<script>";
    echo " Swal.fire({
    icon: 'success',
    title: 'Success',
    text: 'User Deleted Successfully',
    showConfirmButton: false,
    timer: 2500
    }).then(() => {
    window.location.href = 'table.php';
    })";
    echo "</script>";
  }
  ?>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>