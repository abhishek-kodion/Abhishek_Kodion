<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.all.min.js"></script>
    <title>Add User</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
    
    <?php
    $conn = mysqli_connect('localhost', 'root', '', 'tatto_blazers');
    session_start();
  if (!isset($_SESSION['id'])) {
    header('location:login.php');
  } else {
    $user =  $_SESSION['username'];
    // echo $user;
    $id = $_SESSION['id'];
    // echo $id;
  }
    // Define variables and set to empty values'
    $nameErr = $emailErr = $passwordErr = "";
    $name = $email = $password = $address = $phone = $names = "";
    $conpassErr = "";
    $phoneErr = "";
    $addErr = "";
    $imageErr = "";
    $emailErrex = "";

 

    // Function to sanitize and validate input data
    function sanitize_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Process form data on submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validate name
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = sanitize_input($_POST["name"]);
            // Check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
                $nameErr = "Only letters and white space allowed";
            }
        }

        // Validate email
        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = sanitize_input($_POST["email"]);
            // Check if email is valid
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            }
        }


        // Validate password
        if (empty($_POST["password"])) {
            $passwordErr = "Password is required";
        } else {
            $password = (sanitize_input($_POST["password"]));
            // Check if password is strong (at least 8 characters, contains a lowercase letter, an uppercase letter, and a number)
            if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/", $password)) {
                $passwordErr = "Password must be at least 8 characters long and contain at least one lowercase letter, one uppercase letter, and one number";
            }
        }

        // validate conform password
        if (empty($_POST['cpassword'])) {
            $passwordErr = "password is required";
        } else {
            if ($_POST['password'] == $_POST['cpassword']) {
                $hash = password_hash($password, PASSWORD_DEFAULT);
            } else {
                $conpassErr = "password did not matched";
            }
        }



        // validate address
        if (empty($_POST["address"])) {
            $addErr = "address is required";
        } else {
            $address = sanitize_input($_POST["address"]);
        }

        // validate phone number
        if (empty($_POST["phone_number"])) {
            $phoneErr = "phone is required";
        } else {
            $phone = sanitize_input($_POST["phone_number"]);
            // Check if contact is valid
            if (preg_match('/^[0-9]{10}+$/', $phone)) {
                // echo "Valid Phone Number";
            } else {
                $phoneErr = "Invalid Phone Number";
            }
        }


        // validate image
        if (empty($_FILES['image']['tmp_name'])) {
            $imageErr = "Image is required";
        } else {
            $names = $_FILES['image']['name'];
            $tempname = $_FILES['image']['tmp_name'];
            $folder = "images/" . $names;

            // Check if the file was successfully uploaded
            if (move_uploaded_file($tempname, $folder)) {
                // File uploaded successfully
                // echo "Image uploaded successfully!";
            } else {
                // Error in uploading the file
                // echo "Failed to upload the image.";
            }
        }

        

        // validate email
      

                // If all validations pass, you can perform further actions like storing data in a database
                if ($nameErr == "" && $emailErr == "" && $passwordErr == "" && $addErr == "" && $conpassErr == "" && $phoneErr == "" && $imageErr == "" && $conpassErr == "") {

                    // $names=$_FILES['image']['name'];
                    // $tempname=$_FILES['image']['tmp_name'];
                    // $folder="images/".$names;  
 
                    if ($_POST['email']) {
                        $email_sql = "SELECT * FROM `blazers_data` WHERE `email`='$email'";
                        $run = mysqli_query($conn, $email_sql);
                        $count = mysqli_num_rows($run);
            
                        if ($count > 0) {
                            $emailErrex = "Email already exists";
                        } else {

                    $sql = "INSERT INTO `blazers_data`(`name`,`email`,`address`,`contact`,`user_image`,`password`,`user_added_by`) VALUES ('$name','$email','$address','$phone','$names','$hash','$user')";
                    $run = mysqli_query($conn, $sql);
                    if (!$run) {
                      

                        echo "<script>";
                        echo " Swal.fire({
                            icon: 'error',
                            title: 'Failed',
                            text: 'Something went wrong please try again!',
                            showConfirmButton: false,
                            timer: 2500
                            }).then(() => {
                            window.location.href = 'add_user.php';
                            })";
                        echo "</script>";
                    } else {
                  
                        include 'sendEmail.php';
                        echo "<script>";
                        echo " Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'User Added',
                            showConfirmButton: false,
                            timer: 2500
                            }).then(() => {
                            window.location.href = 'table.php';
                            })";
                        echo "</script>";
                    }
                }
            }
        }
    }
    ?>

    <div class="container my-5">
        <div class="row">
          <a href="table.php">  <button class="btn btn-warning text-white "> <i class="fa-solid fa-arrow-left"></i> Back </button></a>
        </div>
        <div class="row">
            <div class="col-6" id="form">
                <h3 class="text-center" style="font-family:Times New Roman;">Add a Team Member</h3>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required value="<?php echo $name ?>">
                        <span class="error"><?php echo $nameErr; ?></span>

                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required value="<?php echo $email ?>">
                        <span class="error"><?php echo $emailErrex; ?></span>
                        <span class="error"><?php echo $emailErr; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="Address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" required value="<?php echo $address ?>">
                        <span class="error"><?php echo $addErr; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Phone Number</label>
                        <input type="text" class="form-control" id="phone_number" name="phone_number" required maxlength="10" minlength="10" value="<?php echo $phone ?>">
                        <span class="error"><?php echo $phoneErr; ?></span>

                    </div>
                    <div class="form-group">
                        <label for="image">User Image</label>
                        <input type="file" class="form-control" id="image" required name="image">
                        <span class="error"><?php echo $imageErr; ?></span>
                    </div>


                    <label for="exampleInputEmail1">Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" name="password" id="myInput1" required maxlength="32" minlength="8">
                        <div class="input-group-append">
                            <button class="btn btn-warning text-white" type="button" onclick="myFunction1()"><i class="fa fa-eye" aria-hidden="true"></i></button>
                        </div>
                    </div>
                    <div class="row">
                        <span class="error"><?php echo $passwordErr; ?></span>
                    </div>



                    <label for="exampleInputEmail1">Confirm Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" name="cpassword" id="myInput2" required maxlength="32" minlength="8">
                        <div class="input-group-append">
                            <button class="btn btn-warning text-white" type="button" onclick="myFunction2()"><i class="fa fa-eye" aria-hidden="true"></i></button>
                        </div>
                    </div>
                    <div class="row">
                        <span class="error"><?php echo $conpassErr; ?></span>
                    </div>


                    <button style="margin-left:196px;" type="submit" class="btn btn-warning text-white btn-lg btn-md mt-3" name="register">Add to Team</button>
                    <!-- <p class="text-center my-3">Already Registered <a href="login.php">Login Here</a></p> -->
                </form>
            </div>
            <div class="col-6">
                <img src="https://images.unsplash.com/photo-1564498659566-cc4eccb7d6bb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTJ8fHRhdHRvfGVufDB8fDB8fHww&auto=format&fit=crop&w=500&q=60" alt="">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
    <div class="container">
        <footer class="bg-light text-center text-lg-start">
            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                © 2023 Copyright:
                <a class="text-dark" href="">Tatto BlazeRs.com</a>
            </div>
            <!-- Copyright -->
        </footer>
    </div>
</body>

</html>

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