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