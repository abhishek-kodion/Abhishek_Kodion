  <?php
    include '../config.php';
    include '../links.php';

  if (isset($_POST['yes'])) {
    $userId = $_POST['yes'];
  }

  $del = "UPDATE `blazers_data` SET `status` ='1' WHERE `id`='$userId'";
  $run = mysqli_query($conn, $del);

  if (!$run) {

    echo "<script>";
    echo " Swal.fire({
        icon: 'error',
        title: 'Success',
        text: 'Something went wrong!',
        showConfirmButton: false,
        timer: 2500
        }).then(() => {
        window.location.href = '../table.php';
        })";
    echo "</script>";
  } else {


    echo "<script>";
    echo " Swal.fire({
    icon: 'success',
    title: 'Success',
    text: 'User Deleted Successfully',
    showConfirmButton: false,
    timer: 2500
    }).then(() => {
    window.location.href = '../table.php';
    })";
    echo "</script>";
  }
  ?>

