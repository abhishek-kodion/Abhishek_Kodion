<?php
include 'links.php';
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="common.css">
    <title>Register-Tatto BlazeRs</title>
</head>

<body>
    <div class="container my-5">
        <div class="row">
            <div class="col-6">
                <img src="image/register.png" alt="">
            </div>
            <div class="col-6" id="form">
                <h1 class="text-center">Welcome to Tatto BlazeRs</h1>
                <form action="php-form-actions/registration-action.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required value="">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required value="" pattern=".+@gmail\.com" size="30">
                    </div>
                    <div class="form-group">
                        <label for="Address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" required value="">
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Phone Number</label>
                        <input type="text" class="form-control" id="phone_number" name="phone_number" required maxlength="10" minlength="10" value="">
                    </div>
                    <div class="form-group">
                        <label for="image">User Image</label>
                        <input type="file" class="form-control" id="image" required name="image">
                    </div>


                    <label for="">Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" name="password" id="myInput1" required maxlength="32" minlength="8">
                        <div class="input-group-append">
                            <button class="btn btn-secondary" type="button" onclick="togglePasswordVisibility('myInput1')"><i class="fa fa-eye" aria-hidden="true"></i></button>
                        </div>
                    </div>

                    <label for="">Confirm Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" name="cpassword" id="myInput2" required maxlength="32" minlength="8">
                        <div class="input-group-append">
                            <button class="btn btn-secondary" type="button" onclick="togglePasswordVisibility('myInput2')"><i class="fa fa-eye" aria-hidden="true"></i></button>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-dark btn-lg btn-block mt-3" name="register">Register</button>
                    <p class="text-center my-3">Already Registered <a href="login.php">Login Here</a></p>
                </form>
            </div>
        </div>
    </div>
    <!-- j query -->
    <div class="container">
        <footer class="bg-light text-center text-lg-start">

            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                © 2023 Copyright:
                <a class="text-dark" href="">Tatto BlazeRs.com</a>
            </div>

        </footer>
    </div>

    <!-- Bootstrap Modal -->
    <!-- <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Confirmation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>We have already your account do you want to reactive?    </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        <a href="account-reactive.php"><button type="button" class="btn btn-primary">Yes</button></a>
                    </div>
                </div>
            </div>
        </div> -->

    <script src="bootstrap/js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="common-script.js"></script>
</body>

</html>