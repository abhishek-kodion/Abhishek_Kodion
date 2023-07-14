<!-- <script src="sweetalert2.all.min.js" defer></script> -->
<?php 
include 'includes/header.php';
session_start();
if(!isset($_SESSION['id']))
{
  header('location:index.php');
}
else
{
  $id = $_SESSION['id'];
  $mail = $_SESSION['username'];
}

$sql = "SELECT * FROM `blazers_data` WHERE `id` = '$id'";
$query_run = mysqli_query($conn,$sql);
if(!$query_run)
{
  echo "No Data found";
}
else{
  while ($rows =mysqli_fetch_assoc($query_run)) {
  }
}
$nameErr = $addressErr = $contactErr = $emailErr = $imageErr = $emailErrex = "";
$name = $address = $contact = $email=  $image = "";

function sanitizeInput($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if(isset($_POST["update"])) {
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

  if($_POST['email']==$mail)
        {                                                 
  $image=$_FILES['image'];
            if(!empty($_FILES["image"]["name"])){
            $filename = $_FILES["image"]["name"];
            $tempname = $_FILES["image"]["tmp_name"];
            $folder= "images/".$filename;
            move_uploaded_file($tempname,$folder);

    $update_data = "UPDATE `blazers_data` SET `name`='$name',`email`='$email',`address`='$address',`contact`='$phone_number',`user_image`='$filename' WHERE `id`='$id'";
    $run = mysqli_query($conn,$update_data);
    if(!$run)
    {
        echo "<script> alert('Profile image update failed)</script>";
    }
    else
    {
        echo "<script>";
        echo " Swal.fire({
        icon: 'success',
        title: 'Success',
        text: 'image Succesfully Updated!',
        showConfirmButton: false,
        timer: 2500
        }).then(() => {
        window.location.href = 'users-profile.php';
        })";
        echo "</script>";
    }
    } else{
 $update_data1 = "UPDATE `blazers_data` SET `name`='$name',`email`='$email',`address`='$address',`contact`='$phone_number' WHERE `id`='$id'";
$run = mysqli_query($conn,$update_data1);
if(!$run)
{
    echo "<script> alert('Profile update failed)</script>";
}
else
{
    echo "<script>";
    echo " Swal.fire({
    icon: 'success',
    title: 'Success',
    text: 'User Data Succesfully Updated!',
    showConfirmButton: false,
    timer: 2500
    }).then(() => {
    window.location.href = 'users-profile.php';
    })";
    echo "</script>";
    // last else
}
// image else
}
// same email post condition
}else{
  if($_POST['email']!==$mail)
  {

    $email_sql = "SELECT * FROM `blazers_data` WHERE `email`='$email'"; 
    $run = mysqli_query($conn,$email_sql);
    $count = mysqli_num_rows($run);
    if($count>0)
    {
    $emailErrex="Email already exists";
    } else
    {

      $image=$_FILES['image'];
            if(!empty($_FILES["image"]["name"])){
            $filename = $_FILES["image"]["name"];
            $tempname = $_FILES["image"]["tmp_name"];
            $folder= "images/".$filename;
            move_uploaded_file($tempname,$folder);

    $update_data = "UPDATE `blazers_data` SET `name`='$name',`email`='$email',`address`='$address',`contact`='$phone_number',`user_image`='$filename' WHERE `id`='$id'";
    $run = mysqli_query($conn,$update_data);
    if(!$run)
    {
        echo "<script> alert('Profile image update failed)</script>";
    }
    else
    {
       

        echo "<script>";
        echo " Swal.fire({
        icon: 'success',
        title: 'Success',
        text: 'image Succesfully Updated!',
        showConfirmButton: false,
        timer: 2500
        }).then(() => {
        window.location.href = 'users-profile.php';
        })";
        echo "</script>";
    }
    } else{
 $update_data1 = "UPDATE `blazers_data` SET `name`='$name',`email`='$email',`address`='$address',`contact`='$phone_number' WHERE `id`='$id'";
$run = mysqli_query($conn,$update_data1);
if(!$run)
{
    echo "<script> alert('Profile update failed)</script>";
}
else
{
  

    echo "<script>";
    echo " Swal.fire({
    icon: 'success',
    title: 'Success',
    text: 'User Data Succesfully Updated!',
    showConfirmButton: false,
    timer: 2500
    }).then(() => {
    window.location.href = 'users-profile.php';
    })";
    echo "</script>";
    // last else
}
// image else
      


}
    }
  }
}

// errors
}
// update post button
} 
?>
<div class="wrapper">
    <?php include 'includes/sidebar.php'; ?>

    <main id="main" class="main">

        <div class="container" >
            <div class="row">
  <div class="row">
  <div class="container my shadow  text-white rounded" style="background: linear-gradient(to right, #4B8BF5, #57C7FF);">
    <div class="row my-3">
    <?php foreach($query_run as $data) { 
        ?>
      <div class="col-12 mt text-center ">
      <img src="images/<?php echo $data['user_image'];?>" class="rounded-circle mx-auto d-block" alt="" height="200px;" width="200px;">
        </a>
      </div>
      
      <div class=" container mt-3 text-center" >
        
        <div class="col-12 text-center" >
        <h3 class="text-center"><?php echo $data['name']; ?></h3>
        </div>
      </div>
    </div>
    <div class="row">
    <div class="col-12">
    <form action="" method="post" enctype="multipart/form-data">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Name</label>
      <input type="text" class="form-control" name="name" id="" required value="<?php echo $data['name']; ?>">
      <span class="error"><?php echo $nameErr; ?></span>
      
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Email</label>
      <input type="text" class="form-control" name="email" id="" required value="<?php echo $data['email']; ?>"  pattern=".+@gmail\.com" size="30">
      <span class="error"><?php echo $emailErr; ?></span>
      <span class="error"><?php echo $emailErrex; ?></span>
      

    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputAddress">Address</label>
      <input type="text" class="form-control"  name="address" id="" required value=" <?php echo $data['address']; ?>">
      <span class="error"><?php echo $addressErr; ?></span>

    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Phone</label>
      <input type="text" class="form-control" name="phone_number" id=""  required maxlength="10" value="<?php echo $data['contact']; ?>">
      <span class="error"><?php echo $contactErr; ?></span>
    </div>

    <!-- <input type="file" id="fileUpload" name="image" style="display: none;"> -->

   <input type="file" class="form-control" name="image">
   <span class="error"><?php echo $imageErr; ?></span>


  </div>

  <button type="submit" class="btn btn-secondary my-3" name="update">Update Profile</button>
  <a href="change-password.php?id=<?php echo $data['id'];?>" class="btn btn-info text-white"  role="button">Change Password</a>
  <?php } ?>
</form>
    </div>
    </div>
  </div>
            </div>
        </div>
    </main>
    
    <?php include 'includes/footer.php'; ?>
</div>



<script>
        // Initialize TinyMCE
        tinymce.init({
            selector: '#myTextarea'
            // Add any additional configuration options as needed
        });
    </script>