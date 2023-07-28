<?php 
include 'links.php';
?>
<!-- have to apply ajax here  -->
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- common style sheet -->
    <link rel="stylesheet" href="common.css">
    <title>Login</title>
</head>

<body>
    <div class="container my-5">
        <div class="row">
            <div class="col-6">
                <img src="image/onlogin.png" alt="">
            </div>
            <div class="col-6">
                <h2 class="text-center" style="margin-top:265px; font-family:cursive">Login Tatto BlazeRs</h2>
                <form action="login_process.php" method="post">
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" required value="">
                      
                    </div>
        
                    <label for="exampleInputEmail1">Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" name="password" id="myInput1" required maxlength="32" minlength="8">
                        <div class="input-group-append">
                            <button class="btn btn-secondary" type="button" onclick="togglePasswordVisibility('myInput1')"><i class="fa fa-eye" aria-hidden="true"></i></button>
                        </div>
                    </div>
                    <div class="row">
            
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg btn-block mt-3" name="login">Login</button>
                </form>
                <div class="row my-3">
                    <h6 class="acc">Don't have an account? <a href="reg-reg.php">Register Here</a></h6>
                    <h6 class="acc">Forgot Password? <a href="forgot-password.php">Click Here</a></h6>
                </div>
            </div>
        </div>
    </div>

<script src="bootstrap/js/jquery.js"></script>
<script src="bootstrap/css/bootstrap.min.css"></script>
<script src="common-script.js"></script>
</body>
</html>



   