<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

<?php
$conn=mysqli_connect('localhost','root','','tatto_blazers');

if(isset($_POST['submit']))
{
    function generateToken($length = 32) {
        $bytes = random_bytes($length);
        return bin2hex($bytes);
    }
    $token = generateToken();

    $mail = $_POST['email'];

// select query to get the user details
    $check_account = "SELECT * FROM `blazers_data` WHERE `email` = '$mail'";
// query run
    $run = mysqli_query($conn,$check_account);
    // to check if the user is avalible or not
    $rows_of_user = mysqli_num_rows($run);
    if($rows_of_user==1)
    {
    // fetch the user password
        $user = mysqli_fetch_assoc($run);
        $password = $user['password'];
        $userId= $user['id'];
        $tokenUsed = 0;
    //    get the user token
        // $token = $_GET['token'];
// genrate time

        $currentDateTime = date('Y-m-d H:i:s');
        $expirationDateTime = date('Y-m-d H:i:s', strtotime('+1 hour', strtotime($currentDateTime)));

    
        $insert_data = "INSERT INTO `password_reset_tokens` (`user_id`,`user_name`, `token`, `password`, `token_created_at`,`token_expire_at`,`token_used`) VALUES ('$userId','$mail', '$token', '$password', '$currentDateTime','$expirationDateTime','$tokenUsed')";

        $sql = mysqli_query($conn,$insert_data);
        if(!$sql)
        {
            echo "not inserted";
        }
        else
        {
            include 'send-password-mail.php';
           
        }
    }
    else{
        echo "can't find user";
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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">


    <title>Forgot Password</title>

    <style>
        .center-form {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body>

    <div class="container mt-5 center-form">
        <div class="row">
            <form action="" method="post">
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" required>
                    <small id="emailHelp" class="form-text text-muted">You will receive a password-reset email in your inbox.</small>
                </div>

                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</body>

</html>

<script>
document.addEventListener('DOMContentLoaded', function() {
    <?php
    // Check if the success parameter is set in the URL
    if (isset($_GET['success']) && $_GET['success'] == 'true') {
        echo 'Swal.fire({
            icon: "success",
            title: "Success",
            text: "Mail sent successfully Please check your indbox",
            showConfirmButton: false,
            timer: 2500
        });';
    }
    ?>
});
</script>