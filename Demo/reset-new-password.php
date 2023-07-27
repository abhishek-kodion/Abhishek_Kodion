<?php
$conn = mysqli_connect('localhost', 'root', '', 'tatto_blazers');
$_link = $_GET['link'];

$sql = "SELECT * FROM `password_reset_tokens` WHERE `token` = '$_link'";
$run = mysqli_query($conn, $sql);

if (!$run) {
    echo "Query not working";
} else {
    $fetch = mysqli_fetch_array($run);

    if (!$fetch) {
        echo "<script>alert('Token Not found, please genrate a new one')</script>";
        exit();
    } else {    
        $pswtoken = $fetch['token'];
        $expire_time = $fetch['token_expire_at'];
        $_userid = $fetch['id'];
        $email = $fetch['user_name'];

        $currentDateTime = date('Y-m-d H:i:s');

        $newpassword = $renewpassword = "";
        $newpassErr = $renewpasswordErr = "";

        // Function to sanitize and validate input data
        function sanitizeInput($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        if ($currentDateTime < $expire_time) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                // new password
                if (empty($_POST['newpass'])) {
                    $newpassErr = 'Please fill in the password';
                } else {
                    $newpassword = sanitizeInput($_POST['newpass']);
                    $uppercase = preg_match('@[A-Z]@', $newpassword);
                    $lowercase = preg_match('@[a-z]@', $newpassword);
                    $number = preg_match('@[0-9]@', $newpassword);
                    $specialChars = preg_match('@[^\w]@', $newpassword);
                    if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($newpassword) < 8) {
                        $newpassErr = 'Password should be at least 8 characters long and include at least one uppercase letter, one number, and one special character.';
                    }
                }

                // confirm new password
                if (empty($_POST['renewpass'])) {
                    $renewpasswordErr = 'Please fill in the password';
                } else {
                    $renewpassword = sanitizeInput($_POST['renewpass']);
                    if ($newpassword !== $renewpassword) {
                        $renewpasswordErr = 'Password and confirm password do not match';
                    }
                }

                    $password = $_POST['newpass']; // Replace with the actual password
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                  

                if (empty($newpassErr) && empty($renewpasswordErr)) {
                    $update = "UPDATE `password_reset_tokens`
                        JOIN `blazers_data` ON `blazers_data`.id = `password_reset_tokens`.user_id
                        SET `blazers_data`.password = '$hashedPassword', `password_reset_tokens`.token_used = 1
                        WHERE `password_reset_tokens`.token = '$_link' AND `password_reset_tokens`.token_used = 0";
                    $result = mysqli_query($conn, $update);
                    $affectedRows = mysqli_affected_rows($conn);

                    if ($affectedRows > 0) {
                        // echo "Password updated successfully";
                        echo "<script>alert('Password recovered successfully')</script>";
                        header('location:index.php');
                    } else {
                        header('Location: error.php');
                        exit();
                    }
                }
            }
        } else {
            echo "<script>alert('Your link has expired please. Try  again')</script>";

        }
    }
}

mysqli_close($conn);
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
    <style>
        .form-form {
            margin-top: 214px;
        }
        
        .form-image 
        {
            margin-top: 40px;
        }   
        .error
        {
            color:red;  
        }
    </style>
    <title>Password recovery</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <form action="" method="POST" class="form-form"><label class="">New password</label>
                    <div class="input-group"><input type="password" class="form-control" name="newpass" id="myInput1" minlength="8" value="" required maxlength="32">
                        <div class="input-group-append"><button class="btn btn-warning" type="button" onclick="myFunction1()"><i class="fa fa-eye" aria-hidden="true"></i></button></div>
                    </div>
                    <div class="row">
                        <span class="error"><?php echo $newpassErr;?></span>
        </div><br><label class="">Confirm Newpassword</label>
                    <div class="input-group"><input type="password" class="form-control" name="renewpass" id="myInput2" value="" minlength="8" required maxlength="32">
                        <div class="input-group-append"><button class="btn btn-warning" type="button" onclick="myFunction2()"><i class="fa fa-eye" aria-hidden="true"></i></button></div>
                    </div>
                    <div class="row">
                        <span class="error"><?php echo $renewpasswordErr;?></span>
        </div><br>
                    <div class="d-flex justify-content-center"><button type="submit" name="update" class="btn btn-warning  btn-lg gradient-custom-4 "><a style="color:white;text-decoration:none;" class="modal-button">Submit</a></button></div>
                </form>
            </div>
            <div class="col-6 form-image"><img src="https://img.freepik.com/free-vector/forgot-password-concept-illustration_114360-4652.jpg?size=626&ext=jpg&ga=GA1.1.1841514627.1686724360&semt=ais" alt="Girl in a jacket" width="500" height="600"></div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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

    function myFunction2() {
        var x = document.getElementById("myInput2");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>