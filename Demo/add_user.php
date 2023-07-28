<?php 
include 'links.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Add User</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="common.css">
</head>
<body>
    
    <div class="container my-5">
        <div class="row">
          <a href="table.php">  <button class="btn btn-warning text-white "> <i class="fa-solid fa-arrow-left"></i> Back </button></a>
        </div>
        <div class="row">
            <div class="col-6" id="form">
                <h3 class="text-center" style="font-family:Times New Roman;">Add a Team Member</h3>
                <form action="php-form-actions/add_user_action.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required value="">
   

                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required value="">
                
                    </div>
                    <div class="form-group">
                        <label for="Address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" required value="">
                        <span class="error"></span>
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Phone Number</label>
                        <input type="text" class="form-control" id="phone_number" name="phone_number" required maxlength="10" minlength="10" value="">
                        <span class="error"></span>

                    </div>
                    <div class="form-group">
                        <label for="image">User Image</label>
                        <input type="file" class="form-control" id="image" required name="image">
                        <span class="error"></span>
                    </div>


                    <label for="exampleInputEmail1">Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" name="password" id="myInput1" required maxlength="32" minlength="8">
                        <div class="input-group-append">
                            <button class="btn btn-warning text-white" type="button" onclick="togglePasswordVisibility('myInput1')"><i class="fa fa-eye" aria-hidden="true"></i></button>
                        </div>
                    </div>
                    <div class="row">
                        <span class="error"></span>
                    </div>



                    <label for="exampleInputEmail1">Confirm Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" name="cpassword" id="myInput2" required maxlength="32" minlength="8">
                        <div class="input-group-append">
                            <button class="btn btn-warning text-white" type="button" onclick="togglePasswordVisibility('myInput2')"><i class="fa fa-eye" aria-hidden="true"></i></button>
                        </div>
                    </div>
                    <div class="row">
                        <span class="error"></span>
                    </div>

                    <button style="margin-left:196px;" type="submit" class="btn btn-warning text-white btn-lg btn-md mt-3" name="register">Add to Team</button>

                </form>
            </div>
            <div class="col-6">
                <img src="image/addUser.png" alt="">
               
            </div>
        </div>
    </div>
  
    <script src="bootstrap/js/jquery.js"></script>
    <script src ="bootstrap/js/bootstrap.min.js"></script>
    <script src="common-script.js"></script>
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

