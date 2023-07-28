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
   
    <title>Password recovery</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <form action="php-form-actions/recover-password.php" method="POST" class="form-form"><label class="">New password</label>
                    <div class="input-group"><input type="password" class="form-control" name="newpass" id="myInput1" minlength="8" value="" required maxlength="32">
                        <div class="input-group-append"><button class="btn btn-warning" type="button" onclick="togglePasswordVisibility('myInput1')"><i class="fa fa-eye" aria-hidden="true"></i></button></div>
                    </div>
                    <div class="row">
                        <!-- <span class="error"></span> -->
        </div><br><label class="">Confirm Newpassword</label>
                    <div class="input-group"><input type="password" class="form-control" name="renewpass" id="myInput2" value="" minlength="8" required maxlength="32">
                        <div class="input-group-append"><button class="btn btn-warning" type="button" oonclick="togglePasswordVisibility('myInput2')"><i class="fa fa-eye" aria-hidden="true"></i></button></div>
                    </div>
                    <div class="row">
            
        </div><br>
                    <div class="d-flex justify-content-center"><button type="submit" name="update" class="btn btn-warning  btn-lg gradient-custom-4 "><a style="color:white;text-decoration:none;" class="modal-button">Submit</a></button></div>
                </form>
            </div>
            <div class="col-6 form-image"><img src="image/passwordrec.png" alt="Girl in a jacket" width="500" height="600"></div>
        </div>
    </div>
<script src="bootstrap/js/jquery.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="common-script.js"></script>

</body>

</html>

