<?php
    include '../config.php';
    include '../links.php';

    // Define variables and set to empty values
    $nameErr = $emailErr = $passwordErr = "";
    $name = $email = $password = $address = $phone = $names = "";
    $conpassErr = "";
    $phoneErr = "";
    $addErr = "";
    $imageErr = "";
    $emailErrex = "";

    // Function to sanitize and validate input data
    function sanitize_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Process form data on submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validate name
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = sanitize_input($_POST["name"]);
            // Check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
                $nameErr = "Only letters and white space allowed";
            }
        }

        // Validate email
        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = sanitize_input($_POST["email"]);
            // Check if email is valid
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            }
        }


        // Validate password
        if (empty($_POST["password"])) {
            $passwordErr = "Password is required";
        } else {
            $password = (sanitize_input($_POST["password"]));
            // Check if password is strong (at least 8 characters, contains a lowercase letter, an uppercase letter, and a number)
            if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/", $password)) {
                $passwordErr = "Password must be at least 8 characters long and contain at least one lowercase letter, one uppercase letter, and one number";
            }
        }

        // validate conform password
        if (empty($_POST['cpassword'])) {
            $passwordErr = "password is required";
        } else {
            if ($_POST['password'] == $_POST['cpassword']) {
                $hash = password_hash($password, PASSWORD_DEFAULT);
            } else {
                $conpassErr = "password did not matched";
            }
        }



        // validate address
        if (empty($_POST["address"])) {
            $addErr = "address is required";
        } else {
            $address = sanitize_input($_POST["address"]);
        }

        // validate phone number
        if (empty($_POST["phone_number"])) {
            $phoneErr = "phone is required";
        } else {
            $phone = sanitize_input($_POST["phone_number"]);
            // Check if contact is valid
            if (preg_match('/^[0-9]{10}+$/', $phone)) {
                // echo "Valid Phone Number";
            } else {
                $phoneErr = "Invalid Phone Number";
            }
        }


        // validate image
        if (empty($_FILES['image']['tmp_name'])) {
            $imageErr = "Image is required";
        } else {
            $names = $_FILES['image']['name'];
            $tempname = $_FILES['image']['tmp_name'];
            $folder = "../images/" . $names;

            // Check if the file was successfully uploaded
            if (move_uploaded_file($tempname, $folder)) {
                // File uploaded successfully
                // echo "Image uploaded successfully!";
            } else {
                // Error in uploading the file
                // echo "Failed to upload the image.";
            }
        }

        // $showModal = false;
        // validate email
        if ($_POST['email']) {
            $email_sql = "SELECT * FROM `blazers_data` WHERE `email`='$email'";
            $run = mysqli_query($conn, $email_sql);
            $count = mysqli_num_rows($run);

            if ($count > 0) {
                $row = mysqli_fetch_assoc($run);
                $status = $row['status'];

                if ($status == 1) {
                    // echo "I want to get redirected";
                    echo '<script>
                    window.addEventListener("DOMContentLoaded", function() {
                        $("#myModal").modal("show");
                    });
                </script>';

                } else {
                    $emailErrex = "Email already exists";
                }
            }        
            else{
            
                // If all validations pass, you can perform further actions like storing data in a database
                if ($nameErr == "" && $emailErr == "" && $passwordErr == "" && $addErr == "" && $conpassErr == "" && $phoneErr == "" && $imageErr == "" && $conpassErr == "") {

        
                    $sql = "INSERT INTO `blazers_data`(`name`,`email`,`address`,`contact`,`user_image`,`password`) VALUES ('$name','$email','$address','$phone','$names','$hash')";
                    $run = mysqli_query($conn, $sql);
                    if (!$run) {
                       
                        echo "<script>";
                        echo " Swal.fire({
                            icon: 'error',
                            title: 'failed',
                            text: 'Registraion failed',
                            showConfirmButton: false,
                            timer: 2500
                            }).then(() => {
                            window.location.href = '../reg-reg.php';
                            })";
                        echo "</script>";
                    } else {
                     
                        include '../sendEmail.php';

                        echo "<script>";
                        echo " Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Registraion Successfull!',
                            showConfirmButton: false,
                            timer: 2500
                            }).then(() => {
                            window.location.href = '../login.php';
                            })";
                        echo "</script>";
                    }
                }
            }
        }
    }   
    ?>