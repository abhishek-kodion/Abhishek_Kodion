<?php 
// $conn= mysqli_connect('localhost','root','','tatto_blazers');
// session_start();    
// if(isset($_SESSION['username'])){
// $user =  $_SESSION['username'];  
// echo $user;
// $sql = "SELECT * FROM `blazers_data` WHERE `email` = '$user'";
// $query = mysqli_query($conn,$sql);
// $rows = mysqli_num_rows($query);
// echo $rows;
// }

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
//   echo $id;
}


if(isset($_POST['submit']))
{
 $name = $_POST['name'];
 $email = $_POST['email'];
 $address = $_POST['address'];
 $phone_number = $_POST['phone_number'];
 $image=$_POST['image'];
if(!empty($image))
{
$filename = $_FILES["image"]["name"];
$tempname = $_FILES["image"]["tmp_name"];
$folder= "images/".$filename;
move_uploaded_file($tempname,$folder);

    $update_data = "UPDATE `blazers_data` SET `name`='$name',`email`='$email',`address`='$address',`contact`='$phone_number',`user_image`='$image' WHERE `id`='$id'";
    $run = mysqli_query($conn,$update_data);
    if(!$run)
    {
        echo "<script> alert('Profile image update failed)</script>";
    }
    else
    {
        echo ("<script LANGUAGE='JavaScript'>
        window.alert('image Succesfully Updated');
        window.location.href='user_data.php';
        </script>");
    }
    } else{
 $update_data = "UPDATE `blazers_data` SET `name`='$name',`email`='$email',`address`='$address',`contact`='$phone_number' WHERE `id`='$id'";
$run = mysqli_query($conn,$update_data);
if(!$run)
{
    echo "<script> alert('Profile update failed)</script>";
}
else
{
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Succesfully Updated');
    window.location.href='user_data.php';
    </script>");
}
}
}
?>