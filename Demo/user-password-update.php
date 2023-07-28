<!doctype html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="common.css">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

  <title>Change password</title>
</head>

<body>

  <div class="container">
    <div class="row my-3">
      <div class="col-6" style="margin-top: 165px;">
        <h3 class="text-center">Change User Password</h3>

        <form action="php-form-actions/user-password-update-action.php" method="POST">
          <div class="form-group">
            <!-- old password -->
            <label for="">Old Password</label>

            <!-- new password -->
            <label for="">New Password</label>
            <div class="input-group">
              <input type="password" class="form-control" name="new_password" required id="myInput1" aria-label="Example select with button addon" placeholder="New password here" maxlength="32" minlength="8">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button" onclick="togglePasswordVisibility('myInput1')"><i class="fa fa-eye" aria-hidden="true"></i></button>
              </div>
            </div>
            <div class="row">

            </div>

            <label for=""> Confirm New Password</label>
            <div class="input-group">
              <input type="password" class="form-control" name="confirm_password" required id="myInput2" aria-label="Example select with button addon" placeholder=" Confirm New password here" maxlength="32" minlength="8">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button" onclick="togglePasswordVisibility('myInput2')"><i class="fa fa-eye" aria-hidden="true"></i></button>
              </div>
            </div>
            <div class="row">

            </div>

            <button class="btn btn-outline-primary btn-block mt-3" type="submit" name="submit"> Change Password </button>
          </div>
        </form>

        <!-- conform new password -->
      </div>

      <div class="col-6">
        <img src="image/user.png" alt="">
      </div>
    </div>
  </div>


  <!-- downloded jquery -->
  <script src="bootstrap/js/jquery.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="common-script.js"></script>


</body>

</html>