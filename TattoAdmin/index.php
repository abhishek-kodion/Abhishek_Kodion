<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.all.min.js"></script>
    <style>
        .acc {
            padding-left: 168px;
        }

        .error {
            color: red;
        }
    </style>
    <title>Login</title>
</head>
<body>

    <?php
    $conn = mysqli_connect('localhost', 'root', '', 'tatto_blazers'); //connection to the database
    $passwordErr = "";
    $emailErr = "";

    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $result = mysqli_query($conn, "SELECT * FROM `blazers_data` WHERE `email`='$email'");
        $row = mysqli_fetch_assoc($result);

        if (mysqli_num_rows($result) > 0) {
            // Verify the password using password_verify function
            if (password_verify($password, $row['password'])) {
                session_start();
                $_SESSION["login"] = true;
                $_SESSION["username"] = $_POST['email'];
                $_SESSION["id"] = $row['id'];
                header("location: stats.php");
            } else {
                $passwordErr = " password is not correct. Please try again.";
            }
        } else {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = 'Invalid email format.';
            } else {
                echo "<script>";
                echo " Swal.fire({
                icon: 'error',
                title: 'Failed to login',
                text: 'Invalid credentials. Please try again!',
                showConfirmButton: false,
                timer: 2500
              }).then(() => {
                window.location.href = 'index.php';
              })";
                echo "</script>";
                // exit();
            }
        }
    }
    ?>

    <div class="container my-5">
        <div class="row">
            <div class="col-6">
                <img src="https://images.unsplash.com/photo-1569858253870-5402388b8197?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8dGF0dG98ZW58MHx8MHx8fDA%3D&auto=format&fit=crop&w=500&q=60" alt="">
            </div>
            <div class="col-6">
                <h2 class="text-center" style="margin-top:265px; font-family:cursive">Login Tatto BlazeRs</h2>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" required value="">
                        <span class="error"><?php echo $emailErr; ?></span>
                    </div>
        
                    <label for="exampleInputEmail1"> Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" name="password" id="myInput" required maxlength="32" minlength="8">
                        <div class="input-group-append">
                            <button class="btn btn-secondary" type="button" onclick="myFunction()"><i class="fa fa-eye" aria-hidden="true"></i></button>
                        </div>
                    </div>
                    <div class="row">
                        <span class="error"><?php echo $passwordErr; ?></span>
                    </div>

                    <button type="submit" class="btn btn-primary  btn-lg btn-block mt-3" name="submit">Login</button>
                </form>
                <div class="row my-3">
                    <h6 class="acc">Don't have an account? <a href="register-form.php">Register Here</a></h6>
                    <h6 class="acc"> Forgot Password <a href="password-recovery-mail.php">Click here to recover</a></h6>
                    <!-- <h6 class="acc"> Forgot Password <a href="gen-token.php">Click here to recover</a></h6> -->
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.all.min.js"></script>
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
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                © 2023 Tattoo BlazeRs.com
            </div>
        </footer>
    </div </div>

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


<!-- <a href="#" onclick="redirectToPHP()">Click me</a>

<script>
  function redirectToPHP() {
    window.location.href = 'path/to/your/file.php';
  }
</script> -->
