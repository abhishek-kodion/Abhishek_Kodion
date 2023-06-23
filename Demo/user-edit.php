<?php
include 'includes/header.php';
// $conn = mysqli_connect('localhost','root','','tatto_blazers');

// $User_id = $_GET['id'];
// // echo $User_id;

// $sel_data = "SELECT * FROM `blazers_data` WHERE `id` = '$User_id'";
// $run_data = mysqli_query($conn,$sel_data);
// $rows = mysqli_num_rows($run_data);
// echo $rows;
// while ($row = mysqli_fetch_assoc($run_data)) {
//     echo "<pre>";
//     print_r($row);
// }
?>

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


  <body>
  <div class="container my-5 shadow bg-white rounded">
    <div class="row my-3">
      <div class="col-12 mt-5 text-center ">
      <img src="https://images.unsplash.com/photo-1687360441063-27492a092519?ixlib=rb-4.0.3&ixid=M3wxMjA3fDF8MHxlZGl0b3JpYWwtZmVlZHw2fHx8ZW58MHx8fHx8&auto=format&fit=crop&w=500&q=60" class="rounded-circle mx-auto d-block" alt="" height="200px;" width="200px;">
      </div>
      <div class="row mt-3">
        <div class="col-12" >
          <h3 style="padding-left:527px;">Name</h3> 
        </div>
      </div>
    </div>
    <div class="row">
    <div class="col-12">
    <form action="" method="post">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Name</label>
      <input type="text" class="form-control" id="inputEmail4">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Email</label>
      <input type="text" class="form-control" id="inputPassword4">
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputAddress">Address</label>
      <input type="text" class="form-control" id="inputEmail4">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Phone</label>
      <input type="text" class="form-control" id="inputPassword4">
    </div>
  </div>
 
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputAddress">Image</label>
      <input type="file" class="form-control" id="inputEmail4">
    </div>
  </div>

  <button type="submit" class="btn btn-primary my-3" name="update">Update User</button>
  <!-- <a href="update-password.php"><button class="btn btn-warning text-white my-3">Change password</button></a> -->
  <a href="update-password.php" class="btn btn-warning text-white"  role="button">Change Password</a>
</form>
    </div>
    </div>
  </div>
<?php 
include 'includes/footer.php';
?>