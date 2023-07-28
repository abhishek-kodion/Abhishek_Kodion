<?php
include '../config.php';
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
                        header('location:../login.php');
                    } else {
                        header('Location: ../error.php');
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