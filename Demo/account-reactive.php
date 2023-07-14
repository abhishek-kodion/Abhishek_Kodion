<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.all.min.js"></script>
    
    <link rel="stylesheet" href="style.css">
    <title>Recover Account</title>
    <style>
        .error{color:red}
    </style>
</head>
<body>
   <?php
$conn = mysqli_connect('localhost', 'root', '', 'tatto_blazers'); //connection to the database
// Define variables to store form data and error messages
$email = $password ="";
$emailErr =$passwordErr= "";

// Function to sanitize and validate input data
    function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }
    // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
     if(isset($_POST['submit']))
    {
    // Validate email
    if (empty($_POST['email'])) {
    $emailErr = 'Email is required';
    } else {
    $email = sanitizeInput($_POST['email']);
    // Check if email is valid
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = 'Invalid email format';
    }
    }

    if (empty($_POST['password'])) {
    $passwordErr = 'Password is required';
    } else {
    $password = sanitizeInput($_POST['password']);
    // Perform password validation as per your requirements
    // ...
    }
 
    if(empty($emailErr)&&empty($passwordErr)){

        $data = "SELECT * FROM `blazers_data` WHERE `email`='$email' && `status`='1'";
        $run = mysqli_query($conn,$data);
        if(!$run)
        {
            echo "<script>";
            echo " Swal.fire({
                icon: 'error',
                title: 'failed',  
                text: 'Data not found!',
                showConfirmButton: false,
                timer: 2500
              }).then(() => {
                window.location.href = 'account-reactive.php';
              })";
              echo "</script>";
           
        }
        else{
    $array = mysqli_fetch_assoc($run);
    if(password_verify($password, $array['password'])) {
    $recover_account= "UPDATE `blazers_data` SET `status`= '0' WHERE `email`='$email'"; 
    $recover_account_query = mysqli_query($conn,$recover_account);
    if($recover_account_query){
        echo "<script>";
        echo " Swal.fire({
            icon: 'success',
            title: 'Success',  
            text: 'Recovered successfully!',
            showConfirmButton: false,
            timer: 2500
          }).then(() => {
            window.location.href = 'login.php';
          })";
    
          echo "</script>";
        }  
        else {
            echo "<script>";
            echo " Swal.fire({
                icon: 'error',
                title: 'failed',  
                text: 'Something went wrong please try again!',
                showConfirmButton: false,
                timer: 2500
              }).then(() => {
                window.location.href = 'account-reactive.php';
              })";
        
              echo "</script>";
           
            // echo "not able to update";
        } 
            //  password verification  
            }else
            {
                echo "<script>";
                echo " Swal.fire({
                    icon: 'error',
                    title: 'failed',  
                    text: 'Please enter correct user id and password!',
                    showConfirmButton: false,
                    timer: 2500
                  }).then(() => {
                    window.location.href = 'account-reactive.php';
                  })";
            
                  echo "</script>";
            }
        
        }
    
} else{
        $passwordErr="Password and email does not match";
        // echo "<script>";
        // echo " Swal.fire({
        //     icon: 'error',
        //     title: 'failed',  
        //     text: 'Please enter correct user id and password!',
        //     showConfirmButton: false,
        //     timer: 2500
        //   }).then(() => {
        //     window.location.href = 'account-reactive.php';
        //   })";
    
        //   echo "</script>";
     }

    //post method  
  }
?>

  <div class="container my-5">
        <div class="row justify-content-center custom-margin">
            <div class="col-md-4 col-sm-6 col-lg-6">

                <form action="" method="POST" class="shadow-lg p-4 rounded">
                    <div class="form-group">
   
                        <label for="email" class="font-weight-bold text-info">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="<?php echo $email; ?> "
                            placeholder="Email" required>
                        <span class="error"><?php echo $emailErr; ?></span>
                    </div>

                    <label class="font-weight-bold text-info">Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" name="password" id="myInput" placeholder="password"
                            value="<?php echo $password ;?>" required maxlength="32">
                        <div class="input-group-append">
                            <button class="btn btn-info" type="button" onclick="myFunction()"><i class="fa fa-eye"
                                    aria-hidden="true"></i></button>
                        </div>
                    </div>
                    <div class="row">
                        <span class="error"><?php echo $passwordErr; ?></span>
                    </div>
                    <br>
                    <button type="submit" name="submit"
                        class="btn btn-info btn-md shadow-sm t">Recover Your account</button>
                </form>

            </div>
        </div>
    </div>
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
</body>
</html>

<!--  password eye javascript -->
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