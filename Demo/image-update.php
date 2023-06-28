<?php
include 'includes/header.php';

// Check if the 'id' parameter is set
if (isset($_GET['id'])) {
    $User_id = $_GET['id'];

    // Check if the user exists in the database
    $sel_data = "SELECT * FROM `blazers_data` WHERE `id` = '$User_id'";
    $run_data = mysqli_query($conn, $sel_data);
    $rows = mysqli_num_rows($run_data);

    if ($rows > 0) {
        // User exists, proceed with form handling

        // Define variables and set to empty values
        $nameErr = $addressErr = $contactErr = $emailErr = $passwordErr = $confirmPasswordErr = "";
        $name = $address = $contact = $email = $password = $confirmPassword = "";

        // Function to sanitize user input
        function sanitizeInput($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        // Handle form submission
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Validate name
            if (empty($_POST["name"])) {
                $nameErr = "Name is required";
            } else {
                $name = sanitizeInput($_POST["name"]);
                // Check if name only contains letters and whitespace
                if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
                    $nameErr = "Only letters and white space allowed";
                }
            }

            // Validate address
            if (empty($_POST["address"])) {
                $addressErr = "Address is required";
            } else {
                $address = sanitizeInput($_POST["address"]);
            }

            // Validate contact number
            if (empty($_POST["contact"])) {
                $contactErr = "Contact number is required";
            } else {
                $contact = sanitizeInput($_POST["contact"]);
                // Check if contact number is a valid format
                if (!preg_match("/^[0-9]{10}$/", $contact)) {
                    $contactErr = "Invalid contact number format";
                }
            }

            // Validate email
            if (empty($_POST["email"])) {
                $emailErr = "Email is required";
            } else {
                $email = sanitizeInput($_POST["email"]);
                // Check if email address is well-formed
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $emailErr = "Invalid email format";
                }
            }

            // Validate password
            if (empty($_POST["password"])) {
                $passwordErr = "Password is required";
            } else {
                $password = $_POST["password"];
                // Password validation rules can be added here
            }

            // Validate confirm password
            if (empty($_POST["confirmPassword"])) {
                $confirmPasswordErr = "Please confirm password";
            } else {
                $confirmPassword = $_POST["confirmPassword"];
                // Confirm password validation rules can be added here
                if ($password !== $confirmPassword) {
                    $confirmPasswordErr = "Passwords do not match";
                }
            }

            // If there are no validation errors, update the user data in the database
            if (empty($nameErr) && empty($addressErr) && empty($contactErr) && empty($emailErr) && empty($passwordErr) && empty($confirmPasswordErr)) {
                $update_User = "UPDATE `blazers_data` SET `name` = '$name' , `email` = '$email' , `address`='$address',`contact`='$contact' WHERE  `id`='$User_id'";

                $run_task = mysqli_query($conn, $update_User);
                if ($run_task) {
                    echo "<script>alert('Updation successful')</script>";
                } else {
                    echo "<script>alert('Updation failed')</script>";
                }
            }
        }
    } else {
        echo "User not found";
    }
} else {
    echo "No user ID specified";
}
