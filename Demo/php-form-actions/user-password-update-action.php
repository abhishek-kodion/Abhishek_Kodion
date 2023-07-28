<?php
include '../links.php';
include '../config.php';
session_start();
if (!isset($_SESSION['id'])) {
  header('location:../login.php');
}

$id = $_GET['id'];

// need all the data 
$sql = "SELECT password FROM `blazers_data` WHERE `id` = '$id' ";
$query = mysqli_query($conn, $sql);
$rows = mysqli_num_rows($query);
$row = $query->fetch_assoc();

$dbpassword = $row['password'];


$newpasswordErr = "";
$cnewpasswordErr = "";

function sanitize_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve the form data
  $newPassword = $_POST["new_password"];
  $confirmPassword = $_POST["confirm_password"];

  if (empty($_POST["current_password"])) {
    $currpasswordErr = "Password is required";
  }

  // new password
  if ($newPassword !== $confirmPassword) {
    echo "Error: New password and confirm password do not match.";
  }

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
    $newpasswordErr = "Password is required";
  } else {
    if ($_POST['new_password'] == $_POST['confirm_password']) {
      $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
    } else {
      $cnewpasswordErr = "Password did not match";
    }
  }

  if ($newpasswordErr == "" && $cnewpasswordErr == "") {
    $sql = "UPDATE `blazers_data` SET `password` = '$hashedPassword' WHERE `id` = '$id'";
    $queryUp = mysqli_query($conn, $sql);
    if (!$queryUp) {
      echo "<script>";
      echo " Swal.fire({
                icon: 'error',
                title: 'Failed',
                text: 'Password updation failed. Try again!',
                showConfirmButton: false,
                timer: 2500
                }).then(() => {
                window.location.href = '../update-password.php';
                })";
      echo "</script>";
    } else {
      echo "<script>";
      echo " Swal.fire({
              icon: 'success',
              title: 'Done',
              text: 'Password updated successfully',
              showConfirmButton: false,
              timer: 2500
              }).then(() => {
              window.location.href = '../table.php';
              })";
      echo "</script>";
    }
  }
}
?>
