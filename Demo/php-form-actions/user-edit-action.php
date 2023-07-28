<?php
include '../includes/header.php';
$id = $_GET['id'];
$usr_email = $_GET['email'];

$sql = "SELECT * FROM `blazers_data` WHERE `id` = '$id'";
$query_run = mysqli_query($conn,$sql);


// validations
$nameErr = $addressErr = $contactErr = $emailErr = $imageErr = $emailErrex = "";
$name = $address = $contact = $email=  $image = "";

// to sanitize user input
function sanitizeInput($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if(isset($_POST["update"])) {
  // Validate name
  
  if (empty($_POST["name"])) {
      $nameErr = "Name is required";
  } else {
      $name = sanitizeInput($_POST["name"]);
      // Check if name only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
          $nameErr = "Only letters and white space allowed";
      }
  }

  // Validate address
  if (empty($_POST["address"])) {
      $addressErr = "Address is required";
  } else {
      $address = sanitizeInput($_POST["address"]);
  }

  // Validate contact number
  if (empty($_POST["phone_number"])) {
      $contactErr = "Contact number is required";
  } else {
      $phone_number = sanitizeInput($_POST["phone_number"]);
      // Check if contact number is a valid format
      if (!preg_match("/^[0-9]{10}$/", $phone_number)) {
          $contactErr = "Invalid contact number format";
      }
  }

  // Validate email
  if (empty($_POST["email"])) {
      $emailErr = "Email is required";
  } else {
      $email = sanitizeInput($_POST["email"]);
      // Check if email address is well-formed
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $emailErr = "Invalid email format";
      }
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($nameErr) && empty($addressErr) && empty($contactErr) && empty($emailErr)  && empty($imageErr)) {

  if($_POST['email']==$usr_email)
        {                                                 
  $image=$_FILES['image'];
            if(!empty($_FILES["image"]["name"])){
            $filename = $_FILES["image"]["name"];
            $tempname = $_FILES["image"]["tmp_name"];
            $folder= "images/".$filename;
            move_uploaded_file($tempname,$folder);

    $update_data = "UPDATE `blazers_data` SET `name`='$name',`email`='$email',`address`='$address',`contact`='$phone_number',`user_image`='$filename' WHERE `id`='$id'";
    $run = mysqli_query($conn,$update_data);
    if(!$run)
    {
        echo "<script> alert('Profile image update failed)</script>";
    }
    else
    {
        echo "<script>";
        echo " Swal.fire({
        icon: 'success',
        title: 'Success',
        text: 'image Succesfully Updated!',
        showConfirmButton: false,
        timer: 2500
        }).then(() => {
        window.location.href = '../table.php';
        })";
        echo "</script>";
    }
    } else{
 $update_data1 = "UPDATE `blazers_data` SET `name`='$name',`email`='$email',`address`='$address',`contact`='$phone_number' WHERE `id`='$id'";
$run = mysqli_query($conn,$update_data1);
if(!$run)
{
    echo "<script> alert('Profile update failed)</script>";
}
else
{
    echo "<script>";
    echo " Swal.fire({
    icon: 'success',
    title: 'Success',
    text: 'User Data Succesfully Updated!',
    showConfirmButton: false,
    timer: 2500
    }).then(() => {
    window.location.href = '../table.php';
    })";
    echo "</script>";
    // last else
}
// image else
}
// same email post condition
}else{
  if($_POST['email']!==$usr_email)
  {

    $email_sql = "SELECT email FROM `blazers_data` WHERE `email`='$email'"; 
    $run = mysqli_query($conn,$email_sql);
    $count = mysqli_num_rows($run);
    if($count>0)
    {
    $emailErrex="Email already exists";
    } else
    {

      $image=$_FILES['image'];
            if(!empty($_FILES["image"]["name"])){
            $filename = $_FILES["image"]["name"];
            $tempname = $_FILES["image"]["tmp_name"];
            $folder= "images/".$filename;
            move_uploaded_file($tempname,$folder);

    $update_data = "UPDATE `blazers_data` SET `name`='$name',`email`='$email',`address`='$address',`contact`='$phone_number',`user_image`='$filename' WHERE `id`='$id'";
    $run = mysqli_query($conn,$update_data);
    if(!$run)
    {
        echo "<script> alert('Profile image update failed)</script>";
    }
    else
    {
       

        echo "<script>";
        echo " Swal.fire({
        icon: 'success',
        title: 'Success',
        text: 'image Succesfully Updated!',
        showConfirmButton: false,
        timer: 2500
        }).then(() => {
        window.location.href = '../table.php';
        })";
        echo "</script>";
    }
    } else{
 $update_data1 = "UPDATE `blazers_data` SET `name`='$name',`email`='$email',`address`='$address',`contact`='$phone_number' WHERE `id`='$id'";
$run = mysqli_query($conn,$update_data1);
if(!$run)
{
    echo "<script> alert('Profile update failed)</script>";
}
else
{
  

    echo "<script>";
    echo " Swal.fire({
    icon: 'success',
    title: 'Success',
    text: 'User Data Succesfully Updated!',
    showConfirmButton: false,
    timer: 2500
    }).then(() => {
    window.location.href = '../table.php';
    })";
    echo "</script>";
    // last else
}
}
    }
  }
}

// errors
}
// update post button
}  
?>