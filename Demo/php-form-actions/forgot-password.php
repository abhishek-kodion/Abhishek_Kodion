<?php

include '../config.php';

if (isset($_POST['submit'])) {
    function generateToken($length = 32) {
        $bytes = random_bytes($length);
        return bin2hex($bytes);
    }

    $token = generateToken();
    $mail = $_POST['email'];

    // select query to get the user details
    $check_account = "SELECT email FROM `blazers_data` WHERE `email` = '$mail'";
    // query run
    $run = mysqli_query($conn, $check_account);
    // to check if the user is available or not
    $rows_of_user = mysqli_num_rows($run);
    if ($rows_of_user == 1) {
        // fetch the user password
        $user = mysqli_fetch_assoc($run);
        $password = $user['password'];
        $userId = $user['id'];
        $tokenUsed = 0;
        // get the user token
      

        $currentDateTime = date('Y-m-d H:i:s');
        $expirationDateTime = date('Y-m-d H:i:s', strtotime('+1 hour', strtotime($currentDateTime)));

        $insert_data = "INSERT INTO `password_reset_tokens` (`user_id`, `user_name`, `token`, `password`, `token_created_at`, `token_expire_at`, `token_used`) VALUES ('$userId', '$mail', '$token', '$password', '$currentDateTime', '$expirationDateTime', '$tokenUsed')";

        $sql = mysqli_query($conn, $insert_data);
        if (!$sql) {
            echo "not inserted";
        } else {
            include '../send-password-mail.php';
        }
    } else {
        echo "Can't find user";
    }
}
?>
