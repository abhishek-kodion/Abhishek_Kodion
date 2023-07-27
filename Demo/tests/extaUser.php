<?php
include 'includes/header.php';

$id=$_GET['id'];
$sql="SELECT * FROM `blazers_data` where `id`='$id'";
$data=mysqli_query($conn,$sql);
$result=mysqli_num_rows($data);
$details=mysqli_fetch_assoc($data);
// echo"<pre>";
// print_r($details);

// Define variables to store form data and error messages
$name = $phone = $email = $address = $password = $confirmPassword = '';
$nameErr = $phoneErr = $fileErr= $emailErr = $addressErr = $passwordErr = $confirmPasswordErr = '';

// Function to sanitize and validate input data
function sanitizeInput($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // Validate name
  if (empty($_POST['name'])) {
    $nameErr = 'Name is required';
  } else {
    $name = sanitizeInput($_POST['name']);
    // Check if name contains only letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
      $nameErr = 'Only letters and whitespace allowed';
    }
  }

  // Validate phone
  if (empty($_POST['phone'])) {
    $phoneErr = 'Phone number is required';
  } else {
    $phone = sanitizeInput($_POST['phone']);
      if(!preg_match("/^[0-9]{10}$/", $phone)) {
          $phoneErr="Mobile must have 10 digits";
        }
    }


  // Validate email
  if (empty($_POST['email'])) {
    $emailErr = 'Email is required';
  } else {
  $email = sanitizeInput($_POST['email']);
  // Check if email is valid
  // if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

  if(!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix",$email)){ 
  $emailErr = 'Invalid email format';
    }
  }

  // Validate address
  if (empty($_POST['address'])) {
    $addressErr = 'Address is required';
  } else {
    $address = sanitizeInput($_POST['address']);
  }
  
  if (empty($nameErr)&& empty($phoneErr) && empty($emailErr) && empty($addressErr)) {
    if($email==$details['email'])
  {
  $image=$_FILES['uploadfile'];
  if(!empty($_FILES['uploadfile']['name'])){
  $names=$_FILES['uploadfile']['name'];
  $tempname=$_FILES['uploadfile']['tmp_name'];
  $folder="images/".$names;

  move_uploaded_file($tempname,$folder);
  $sql="UPDATE `blazers_data` SET `name`='$name',`user_image`='$names',`email`='$email',address='$address',`contact`='$phone' WHERE id='$id'";
  $res=mysqli_query($conn,$sql);
  echo $res;
  if($res>0)
                {
          
      

                  echo "<script>";
                  echo " Swal.fire({
                      icon: 'success',
                      title: 'Success',
                      text: 'Updated successfully!',
                      showConfirmButton: false,
                      timer: 2500
                    }).then(() => {
                      window.location.href = 'homepage.php';
                    })";
              
                    echo "</script>";

                }
else 
            {
    echo "Unable to Update";
            }
    }


else
{
    $sql="UPDATE `blazers_data` SET `name`='$name',`email`='$email',`address`='$address',`contact`='$phone' WHERE `id`='$id'";
    $res=mysqli_query($conn,$sql);
    if($res>0)
                {          
             
                  echo "<script>";
                  echo " Swal.fire({
                      icon: 'success',
                      title: 'Success',
                      text: 'Updated successfully!',
                      showConfirmButton: false,
                      timer: 2500
                    }).then(() => {
                      window.location.href = 'homepage.php';
                    })";
              
                    echo "</script>";
                }
else 
            {
    echo "Unable to Update";
            }
}

}

  else
  {
    if($email!==$details['email'])
    {
      $email_sql = "SELECT * FROM `blazers_data` WHERE `email`='$email'"; 
      $run = mysqli_query($conn,$email_sql);
      $count = mysqli_num_rows($run);
      $row= mysqli_fetch_assoc($run);
      // $secondary_email=$row['email'];
      // echo $secondary_email;
      // die;
    if($count>0)
    {
      $emailErr= " Please try another email this email already exists";
    }
    else
    {
      $image=$_FILES['uploadfile'];
      if(!empty($_FILES['uploadfile']['name'])){
      $names=$_FILES['uploadfile']['name'];
      $tempname=$_FILES['uploadfile']['tmp_name'];
      $folder="images/".$names;
    
      move_uploaded_file($tempname,$folder);
      $sql="UPDATE `blazers_data` SET `name`='$name',`profile_image`='$names',`email`='$email',address='$address',`contact`='$phone' WHERE id='$id'";
      $res=mysqli_query($conn,$sql);
      echo $res;
      if($res>0)
                    {
                      echo "<script>";
                      echo " Swal.fire({
                          icon: 'success',
                          title: 'Success',
                          text: 'Updated successfully!',
                          showConfirmButton: false,
                          timer: 2500
                        }).then(() => {
                          window.location.href = 'homepage.php';
                        })";
                        echo "</script>";
                    }
    else 
                {
        echo "Unable to Update";
                }
        }
    
    
    else
    {
        $sql="UPDATE `blazers_data` SET `name`='$name',`email`='$email',`address`='$address',`contact`='$phone'WHERE `id`='$id'";
        $res=mysqli_query($conn,$sql);
        if($res>0)
                    {          
                      echo "<script>";
                      echo " Swal.fire({
                          icon: 'success',
                          title: 'Success',
                          text: 'Updated successfully!',
                          showConfirmButton: false,
                          timer: 2500
                        }).then(() => {
                          window.location.href = 'homepage.php';
                        })";
                        echo "</script>";
                    }
    else 
                {
        echo "Unable to Update";
                }
        }
    
      }
    }
  }
  }
      else
      {
        $emailErr= "Already exists";
      }
  } 
?>


    <!-- html -->
    <section>
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container my-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                  <div class="row">
                    <div class="col-12">
                    <div class="form-outline text-center">
                                        <img src="images/<?php echo $details['user_image'] ?>" height="200px" width="200px"
                                          class="rounded-circle">
                                    </div>
                    </div>
                    <div class="col-12">
<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-outline mb-4">
        <label class="form-label" for="form3Example1cg">Your Name</label>
        <input type="text" id="form3Example1cg" class="form-control form-control-lg"
            name="name" value="<?php echo $details['name'] ?>" />
        <span class="error"><?php echo $nameErr; ?></span>
    </div>

    <div class="form-outline mb-4">
        <label class="form-label" for="form3Example1cg"
            value="<?php echo $details['user_image'] ?>">Profile Image</label>
        <input type="file" name="uploadfile" id="form3Example1cg"
            class="form-control form-control-lg">
    </div>

    <div class="form-outline mb-4">
        <label class="form-label" for="form3Example3cg">Your Email</label>
        <input type="email" id="form3Example3cg" class="form-control form-control-lg"
            name="email" value="<?php echo $details['email'] ?>" />
        <span class="error"><?php echo $emailErr; ?></span>
    </div>

    <div class="form-outline mb-4">
        <label class="form-label" for="form3Example4cdg">Address</label>
        <input type="text" id="form3Example4cdg" class="form-control form-control-lg"
            name="address" value="<?php echo $details['address'] ?>" />
        <span class="error"><?php echo $addressErr; ?></span>
    </div>

    <div class="form-outline mb-4">
        <label class="form-label" for="form3Example4cdg">Phone Number</label>
        <input type="number" id="form3Example4cdg" class="form-control form-control-lg"
            name="phone" value="<?php echo $details['contact'] ?>" />
        <span class="error"><?php echo $phoneErr; ?></span>
    </div>

  
    <div class="d-flex justify-content-center">
        <button type="submit" name="update"
            class="btn btn-warning text-white btn-block btn-lg">Update
        </button>
    </div>
    <!-- <div>
        <a href="passwordupdate.php?id=<?php echo $details['id'] ?>">Update
            password</a>
    </div> -->
</form>
                    </div>
</div>
                </div>
            </div>
        </div>
    </section>

    <!-- modal logout-->
    


   