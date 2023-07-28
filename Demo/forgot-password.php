<?php
include 'links.php';
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="common.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

    <title>Forgot Password</title>


</head>

<body>

    <div class="container mt-5 center-form">
        <div class="row">
            <form action="php-form-actions/forgot-password.php" method="post">
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" required>
                    <small id="emailHelp" class="form-text text-muted">You will receive a password-reset email in your inbox.</small>
                </div>

                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <script script="bootstrap/js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="common-script.js"></script>
</body>

</html>

<!-- have to be edited later if possible -->
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