<?php
// Handle form submission and validation
$errors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Perform server-side validation, add errors to the $errors array if needed
    if (empty($username)) {
        $errors[] = "Username is required.";
    }
    if (empty($password)) {
        $errors[] = "Password is required.";
    }

    // Process the form data, perform database operations, etc. (Not shown in this example)
}

// Return errors as a JSON response
echo json_encode(["errors" => $errors]);
?>
