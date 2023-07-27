<?php
include 'includes/header.php';
$id = $_GET['id'];
echo $id;

$sql = "SELECT * FROM `blazers_data` WHERE `id` = '$id'";
$query = mysqli_query($conn, $sql);



// validations
$nameErr = $addressErr = $contactErr = $emailErr = $imageErr = "";
$name = $address = $contact = $email =  $image = "";


// to sanitize user input
function sanitizeInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


// if ($_SERVER["REQUEST_METHOD"] == "POST") {
if (isset($_POST["submit"])) {
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
    if (empty($_POST["phone_number"])) {
        $contactErr = "Contact number is required";
    } else {
        $phone_number = sanitizeInput($_POST["phone_number"]);
        // Check if contact number is a valid format
        if (!preg_match("/^[0-9]{10}$/", $phone_number)) {
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

    if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($nameErr) && empty($addressErr) && empty($contactErr) && empty($emailErr)  && empty($imageErr)) {

        if (!empty($_POST['image'])) {
            $image = $_POST['image'];
            $filename = $_FILES["image"]["name"];
            $tempname = $_FILES["image"]["tmp_name"];
            $folder = "images/" . $filename;
            move_uploaded_file($tempname, $folder);

            $update_data = "UPDATE `blazers_data` SET `name`='$name',`email`='$email',`address`='$address',`contact`='$phone_number',`user_image`='$image' WHERE `id`='$id'";
            $run = mysqli_query($conn, $update_data);
            if (!$run) {
                echo "<script> alert('Profile image update failed)</script>";
            } else {
                echo ("<script LANGUAGE='JavaScript'>
        window.alert('image Succesfully Updated');
        window.location.href='table.php';
        </script>");
            }
        } else {
            $update_data1 = "UPDATE `blazers_data` SET `name`='$name',`email`='$email',`address`='$address',`contact`='$phone_number' WHERE `id`='$id'";
            $run = mysqli_query($conn, $update_data1);
            if (!$run) {
                echo "<script> alert('Profile update failed)</script>";
            } else {
                echo ("<script LANGUAGE='JavaScript'>
    window.alert('Succesfully Updated');
    window.location.href='table.php';
    </script>");
            }
        }
    }
}
?>
<?php while ($data = (mysqli_fetch_array($query))) { ?>
    <div class="container my-5 shadow-lg p-3 mb-5 bg-white rounded">
        <div class="row">
            <div class="col-6">
                <img src="images/<?php echo $data['user_image']; ?>" class="rounded-circle mx-auto d-block" alt="" height="200px;" width="200px;">
                <h5 class="text-center"><?php echo $data['name']; ?></h5>
            </div>
            <div class="col-6">
                <form action="" method="post">
                    <div class="row my-4">
                        <div class="col">
                            <input type="text" class="form-control" name="name" value="<?php echo $data['name']; ?>">
                            <span class="error"><?php echo $nameErr; ?></span>
                        </div>

                        <div class="col">
                            <input type="Email" class="form-control" name="email" value="<?php echo $data['email']; ?>" pattern=".+@gmail\.com" size="30">

                        </div>
                        <span class="error"><?php echo $emailErr; ?></span>

                    </div>
                    <div class="row my-2">
                        <div class="col">
                            <input type="text" class="form-control" name="address" value="<?php echo $data['address']; ?>">
                            <span class="error"><?php echo $addressErr; ?></span>
                        </div>

                        <div class="col">
                            <input type="text" class="form-control" name="phone_number" value="<?php echo  $data['contact']; ?> " maxlength="10" required>
                            <span class="error"><?php echo $contactErr; ?></span>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-12">
                            <input type="file" class="form-control" name="image">
                        </div>
                        <span class="error"><?php echo $imageErr; ?></span>
                    </div>

                    <div class="row  my-4">
                        <div class="col-6">
                            <button type="submit" name="submit" class="btn btn-md btn-primary center btn-block" id="updatebtn"> Update profile</button>

                        </div>

                        <div class="col-6">
                            <a href="update-password.php" class="btn btn-success btn-block text-white">Update Password</a>

                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
    </div>
    </div>
<?php } ?>

<?php include 'includes/footer.php' ?>