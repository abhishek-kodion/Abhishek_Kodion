
<?php
    $_link= $_GET['link'];

    $sql = "SELECT * FROM `password_reset` WHERE `token`='$_link'";
    $data = mysqli_query($conn,$sql);
    $details = mysqli_fetch_assoc($data);
    $expire_time = $details['expiration_time'];
    $_userid = $details['user_id'];
    $email = $details['email'];
    $currentDateTime = date('Y-m-d H:i:s');
    $newpassword = $renewpassword = '';
    $newpassErr = $renewpasswordErr = '';

    // Function to sanitize and validate input data
    function sanitizeInput($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if($currentDateTime<$expire_time)
    {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // new password
        if (empty($_POST['newpass'])) {
            $newpassErr = 'Please fill the password';
        } else {
            $newpassword = sanitizeInput($_POST['newpass']);
            $uppercase = preg_match('@[A-Z]@', $newpassword);
            $lowercase = preg_match('@[a-z]@', $newpassword);
            $number = preg_match('@[0-9]@', $newpassword);
            $specialChars = preg_match('@[^\w]@', $newpassword);
            if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($newpassword) < 8) {
                $newpassErr = 'Password should be at least 8 characters in length and should include at least one uppercase letter, one number, and one special character.';
            }
        }

        // confirm new password
        if (empty($_POST['renewpass'])) {
            $renewpasswordErr = 'Please fill the password';
        } else {
            $renewpassword = sanitizeInput($_POST['renewpass']);
            if ($newpassword !== $renewpassword) {
                $renewpasswordErr = 'Password and confirm password do not match';
            }
        }

        // if ($oldpassword == $renewpassword) {
        //     $renewpasswordErr = 'New password cannot be the same as old password';
        // }

        if (empty($newpassErr) && empty($renewpasswordErr)) {
            $newpassword = md5($newpassword);
            $update = "UPDATE `register`
            JOIN `password_reset` ON `register`.id = `password_reset`.user_id
            SET `register`.password = '$newpassword', `password_reset`.used = 1
            WHERE `password_reset`.token = '$_link' AND `password_reset`.used = 0";
            $result = mysqli_query($conn, $update); 
            $affectedRows = mysqli_affected_rows($conn);

            if ($affectedRows > 0) {
                echo "<script>";
                echo " Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Password changed successfully!',
                    showConfirmButton: false,
                    timer: 2500
                  })";
                  echo "</script>";
            } else {
                // echo "Password update failed. Link may be invalid or has already been used.";
                header('location:error-500.html');
            }
        }
    }

    }
    else
    {
        echo "Your link had been expired.";
    }
?>