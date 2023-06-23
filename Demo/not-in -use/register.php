<?php
$conn = mysqli_connect('localhost','root','','tatto_blazers');
if(isset($_POST['register']))
{
$name = $_POST['name'];
$email = $_POST['email'];
$address = $_POST['address'];
$phone = $_POST['phone_number'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
// file upload code
$filename = $_FILES["image"]["name"];
$tempname = $_FILES["image"]["tmp_name"];
$folder= "images/".$filename;
move_uploaded_file($tempname,$folder);

//email validation 
$email_sql = "SELECT * FROM `blazers_data` WHERE `email`='$email'"; 
$run = mysqli_query($conn,$email_sql);
$count = mysqli_num_rows($run);

if($count>0)
{
  echo "<script>alert('The email alreay exists');</script>";
}else
{
 
  if(strlen($phone)==10) //phone number validation
  {
{
// $uppercase = preg_match('@[A-Z]@', $password);
// $lowercase = preg_match('@[a-z]@', $password);
// $number    = preg_match('@[0-9]@', $password);
// $specialChars = preg_match('@[^\w]@', $password);

// if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
//   echo 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';

//   }
  
if($password===$cpassword) 
  //user end password validation 
  {
    $sql = "INSERT INTO `blazers_data`(`name`,`email`,`address`,`contact`,`user_image`,`password`) VALUES ('$name','$email','$address','$phone','$filename','$password')";
    $run =mysqli_query($conn,$sql);
    echo $run;
    if(!$run){
      echo "<script>alert('Something went wrong please try again'); </script>";
      echo ("<script LANGUAGE='JavaScript'>
      window.alert('Something went wrong please try again');
      window.location.href='register.html';
      </script>");
    }
    else
    {
      // echo "<script>alert('Registraion Successfull'); </script>";
      // header('location:login.php');

      echo ("<script LANGUAGE='JavaScript'>
      window.alert('Registraion Successfull');
      window.location.href='login.html';
      </script>");
    }
  }
  else{
    // echo "<script>alert('password did not matched');</script>";

    echo ("<script LANGUAGE='JavaScript'>
    window.alert('password did not matched');
    window.location.href='register.html';
    </script>");
    
  }
}
}
else{
  // echo "<script>alert('enter a valid contact num');</script>";
  echo ("<script LANGUAGE='JavaScript'>
  window.alert('enter a valid contact num');
  window.location.href='register.html';
  </script>");
}
} 
} //first condition of form 
?>

