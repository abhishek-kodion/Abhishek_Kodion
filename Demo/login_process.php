<?php
  include 'config.php';

  include 'links.php';
  
    if (isset($_POST['login'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        $result = mysqli_query($conn, "SELECT * FROM `blazers_data` WHERE `email`='$email' && `status`='0'");
        $row = mysqli_fetch_assoc($result);

        if (mysqli_num_rows($result) > 0) {
            // Verify the password using password_verify function
            if (password_verify($password, $row['password'])) {
                session_start();
                $_SESSION["login"] = true;
                $_SESSION["username"] = $_POST['email'];
                $_SESSION["id"] = $row['id'];
                header("location: homepage.php");
            } else {
                header('location:login.php');
                $passwordErr = "username or password is not correct. Please try again.";
            }
        } else {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                header('location:login.php');
                $emailErr = 'Invalid email format.';
            } else {
                echo ("<script LANGUAGE='JavaScript'>
                window.alert('Invalid credentials. Please try again.');
                window.location.href='login.php';
                </script>");

            //     echo "<script>";
            //     echo " Swal.fire({
            //     icon: 'error',
            //     title: 'Failed to login',
            //     text: 'Invalid credentials. Please try again!',
            //     showConfirmButton: false,
            //     timer: 2500
            //   }).then(() => {
            //     window.location.href = 'login.php';
            //   })";
            //     echo "</script>";
            }
        }
    }

    ?>