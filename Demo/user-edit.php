<body>
  <div class="container mt-3">
    <a href="table.php"> <button class="btn btn-primary text-white "> <i class="fa-solid fa-arrow-left"></i> Back </button></a>
  </div>
  </div>
  <div class="row">
    <div class="container my-5 shadow bg-white rounded">
      <div class="row my-3">
        <?php while ($data = mysqli_fetch_assoc($query_run)) {
        ?>
          <div class="col-12 mt-5 text-center ">
            <img src="images/<?php echo $data['user_image']; ?>" class="rounded-circle mx-auto d-block" alt="" height="200px;" width="200px;">

            </a>
          </div>

          <div class=" container mt-3 text-center">

            <div class="col-12 text-center">
              <h3 class="text-center"><?php echo $data['name']; ?></h3>
            </div>
          </div>
      </div>
      <div class="row">
        <div class="col-12">
          <form action="php-form-actions/user-edit-action.php" method="post" enctype="multipart/form-data">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputEmail4">Name</label>
                <input type="text" class="form-control" name="name" id="" required value="">


              </div>
              <div class="form-group col-md-6">
                <label for="inputPassword4">Email</label>
                <input type="text" class="form-control" name="email" id="" required value="" pattern=".+@gmail\.com" size="30">



              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputAddress">Address</label>
                <input type="text" class="form-control" name="address" id="" required value=" ">


              </div>
              <div class="form-group col-md-6">
                <label for="inputPassword4">Phone</label>
                <input type="text" class="form-control" name="phone_number" id="" required maxlength="10" value="">


              </div>



              <input type="file" class="form-control" name="image">


            </div>


            <button type="submit" class="btn btn-primary my-3" name="update">Update User</button>

            <a href="user-password-update.php?id=<?php echo $data['id']; ?>" class="btn btn-info text-white" role="button">Change Password</a>
          <?php } ?>
          </form>
        </div>
      </div>
    </div>
  </div>


  <?php
  include 'includes/footer.php';
  ?>