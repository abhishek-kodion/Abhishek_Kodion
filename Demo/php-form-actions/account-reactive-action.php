<?php
include '../links.php';
include '../config.php';

// Define variables to store form data and error messages
$email = $password = "";
$emailErr = $passwordErr = "";

// Function to sanitize and validate input data
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST['submit'])) {
    // Validate email
    if (empty($_POST['email'])) {
        $emailErr = 'Email is required';
    } else {
        $email = sanitizeInput($_POST['email']);
        // Check if email is valid
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = 'Invalid email format';
        }
    }

    if (empty($_POST['password'])) {
        $passwordErr = 'Password is required';
    } else {
        $password = sanitizeInput($_POST['password']);
        // Perform password validation as per your requirements
        // ...
    }

    if (empty($emailErr) && empty($passwordErr)) {
        $data = "SELECT email , status FROM `blazers_data` WHERE `email`='$email' && `status`='1'";
        $run = mysqli_query($conn, $data);
        if (!$run) {
            echo "<script>";
            echo "Swal.fire({
                icon: 'error',
                title: 'Failed',  
                text: 'Data not found!',
                showConfirmButton: false,
                timer: 2500
            }).then(() => {
                window.location.href = '../account-reactive.php';
            })";
            echo "</script>";
        } else {
            $array = mysqli_fetch_assoc($run);
            if (password_verify($password, $array['password'])) {
                $recover_account = "UPDATE `blazers_data` SET `status`= '0' WHERE `email`='$email'"; 
                $recover_account_query = mysqli_query($conn, $recover_account);
                if ($recover_account_query) {
                    echo "<script>";
                    echo "Swal.fire({
                        icon: 'success',
                        title: 'Success',  
                        text: 'Recovered successfully!',
                        showConfirmButton: false,
                        timer: 2500
                    }).then(() => {
                        window.location.href = '../login.php';
                    })";
                    echo "</script>";
                } else {
                    echo "<script>";
                    echo "Swal.fire({
                        icon: 'error',
                        title: 'Failed',  
                        text: 'Something went wrong, please try again!',
                        showConfirmButton: false,
                        timer: 2500
                    }).then(() => {
                        window.location.href = '../account-reactive.php';
                    })";
                    echo "</script>";
                }
            } else {
                echo "<script>";
                echo "Swal.fire({
                    icon: 'error',
                    title: 'Failed',  
                    text: 'Please enter correct user id and password!',
                    showConfirmButton: false,
                    timer: 2500
                }).then(() => {
                    window.location.href = '../account-reactive.php';
                })";
                echo "</script>";
            }
        }
    } else {
        $passwordErr = "Password and email do not match";
    }
}
?>
