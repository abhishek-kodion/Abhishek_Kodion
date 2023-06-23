<?php
$connection_db = mysqli_connect('localhost','root','','task'); //database connection 
if(isset($_POST['register']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact_number = $_POST['contact_number'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    $passwordHash = password_hash($password,PASSWORD_BCRYPT);

    $errors = array();
    if(empty($name)|| empty($email)||empty($contact_number)||empty($address)||empty($password)||empty($confirm_password)) 
    {
        array_push($errors,"All feilds are required");
    }
    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        array_push($errors,"Email is not valid");
    }
    if(strlen($contact_number)<10)
    {   
        array_push($errors,"Enter valid contact");
    }
    if(strlen($password)<8)
    {
        array_push($errors,"password must be of 8 charcters");
    }

    if($password!==$confirm_password)
    {
        array_push($errors,"password does not match");
    }
    if(count($errors)>0)
    {
        foreach($errors as $error)
        {
            echo"<div class='alert alert-danger'>$error</div>";   
        }
    }
    else{

        $insert_data = "INSERT INTO `user_data`(`name`,`email`,`contact_number`,`address`,`password`)VALUES('$name','$email','$contact_number','$address','$passwordHash')";
        $run = mysqli_query($connection_db,$insert_data);
        
        if(!$run)
        {
        echo "<script>alert('Can't Register')</script>";
        // echo "<script>location.href='register.html'</script>";
        // echo "header('location:register.html')";
        }
        else
        {
            echo header('location:login_user.html');
        }
}
}
?>
















<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Register</title>
</head>

<body>
    <div class="container my-5">
        <div class="row">
            <div class="col-6">
                <img src="https://images.unsplash.com/photo-1685168641039-712c1eb2ff23?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHx0b3BpYy1mZWVkfDE3fFM0TUtMQXNCQjc0fHxlbnwwfHx8fHw%3D&auto=format&fit=crop&w=500&q=60" alt="">
            </div>
            <div class="col-6" style="margin-top: 80px;">
                <h2 class="text-center text-primary">Sign Up</h2>
                <form action="register.php" method="post">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>

                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>

                    <div class="form-group">
                        <label for="contact_number">Contact Number</label>
                        <input type="number" class="form-control" id="contact_number" name="contact_number">
                    </div>

                    <div class="form-group">
                        <label for="address"> Address </label>
                        <input type="text" class="form-control" id="address" name="address">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirm_Password</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block" name="register">Register</button>
                </form>
                <h4 class="text-center my-3">Already Registerd <a href="login_user.html">Login</a></h4>
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
</body>

</html>