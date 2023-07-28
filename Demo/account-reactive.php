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
    <title>Recover Account</title>
</head>
<body>
    <div class="container my-5">
        <div class="row justify-content-center custom-margin">
            <div class="col-md-4 col-sm-6 col-lg-6">
                <form action="php-form-actions/account-reactive-action.php" method="POST" class="shadow-lg p-4 rounded">
                    <div class="form-group">
                        <label for="email" class="font-weight-bold text-info">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="<?php echo $email; ?>" placeholder="Email" required>
                        <span class="error"><?php echo $emailErr; ?></span>
                    </div>
                    <label class="font-weight-bold text-info">Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" name="password" id="myInput" placeholder="password" value="<?php echo $password; ?>" required maxlength="32">
                        <div class="input-group-append">
                            <button class="btn btn-info" type="button" onclick="myFunction()"><i class="fa fa-eye" aria-hidden="true"></i></button>
                        </div>
                    </div>
                    <div class="row">
                        <span class="error"><?php echo $passwordErr; ?></span>
                    </div>
                    <br>
                    <button type="submit" name="submit" class="btn btn-info btn-md shadow-sm">Recover Your account</button>
                </form>
            </div>
        </div>
    </div>
    <script src="bootstrap/js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>