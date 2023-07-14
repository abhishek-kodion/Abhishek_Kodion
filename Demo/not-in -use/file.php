<?php 
$filename = $_FILES["uploadfile"]["name"];
$tempname = $_FILES["uploadfile"]["tmp_name"];
$folder= "images/".$filename;
move_uploaded_file($tempname,$folder);
echo $folder;



if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $email_sql = "SELECT * FROM `blazers_data` WHERE `email`='$email'";
    $run = mysqli_query($conn, $email_sql);
    $count = mysqli_num_rows($run);

    if ($count > 0) {
        $row = mysqli_fetch_assoc($run);
        $status = $row['status'];

        if ($status == 1) {
            echo "I want to get redirected";
        } else {
            $emailErrex = "Email already exists";
        }
    } else {
        // Email does not exist in the database
    }
}


?>