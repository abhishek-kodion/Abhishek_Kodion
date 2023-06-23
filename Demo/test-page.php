<!DOCTYPE html>
<html>
<head>
    <title>User Edit Page</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>

    <?php
        // Define variables and set to empty values
        $nameErr = $addressErr = $contactErr = $emailErr = $passwordErr = $confirmPasswordErr = $imageErr = "";
        $name = $address = $contact = $email = $password = $confirmPassword = $image = "";

        // Function to sanitize user input
        function sanitizeInput($data) {
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

            // Validate image upload
            if ($_FILES["image"]["error"] === 0) {
                $allowedTypes = array("image/jpeg", "image/jpg", "image/png");
                $imageType = $_FILES["image"]["type"];
                if (!in_array($imageType, $allowedTypes)) {
                    $imageErr = "Invalid image type. Only JPG, JPEG, and PNG files are allowed.";
                } else {
                    $image = $_FILES["image"]["name"];
                    // Move uploaded file to desired directory
                    move_uploaded_file($_FILES["image"]["tmp_name"], "uploads/" . $image);
                }
            }
        }
    ?>

    <h2>User Edit Page</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
        <label>Name:</label>
        <input type="text" name="name" value="<?php echo $name; ?>">
        <span class="error"><?php echo $nameErr; ?></span>
        <br><br>

        <label>Address:</label>
        <input type="text" name="address" value="<?php echo $address; ?>">
        <span class="error"><?php echo $addressErr; ?></span>
        <br><br>

        <label>Contact Number:</label>
        <input type="text" name="contact" value="<?php echo $contact; ?>">
        <span class="error"><?php echo $contactErr; ?></span>
        <br><br>

        <label>Email:</label>
        <input type="text" name="email" value="<?php echo $email; ?>">
        <span class="error"><?php echo $emailErr; ?></span>
        <br><br>

        <label>Password:</label>
        <input type="password" name="password">
        <span class="error"><?php echo $passwordErr; ?></span>
        <br><br>

        <label>Confirm Password:</label>
        <input type="password" name="confirmPassword">
        <span class="error"><?php echo $confirmPasswordErr; ?></span>
        <br><br>

        <label>Upload Image:</label>
        <input type="file" name="image">
        <span class="error"><?php echo $imageErr; ?></span>
        <br><br>

        <input type="submit" name="submit" value="Save">
    </form>

    <?php
        // Display submitted data if no errors
        if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($nameErr) && empty($addressErr) && empty($contactErr) && empty($emailErr) && empty($passwordErr) && empty($confirmPasswordErr) && empty($imageErr)) {
            echo "<h2>Submitted Data:</h2>";
            echo "Name: " . $name . "<br>";
            echo "Address: " . $address . "<br>";
            echo "Contact Number: " . $contact . "<br>";
            echo "Email: " . $email . "<br>";
            echo "Password: ********<br>"; // For security reasons, we don't display the password
            if (!empty($image)) {
                echo "Image: <img src='uploads/" . $image . "' alt='User Image'><br>";
            }
        }
    ?>
</body>
</html>



















