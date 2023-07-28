<?php while ($data = (mysqli_fetch_array($query))) { ?>
    <div class="container my-5 shadow-lg p-3 mb-5 bg-white rounded">
        <div class="row">
            <div class="col-6">
                <img src="images/<?php echo $data['user_image']; ?>" class="rounded-circle mx-auto d-block" alt="" height="200px;" width="200px;">
                <h5 class="text-center"><?php echo $data['name']; ?></h5>
            </div>
            <div class="col-6">
                <form action="php-form-actions/user_data_action.php" method="post" enctype="multipart/form-data">
                    <div class="row my-4">
                        <div class="col">
                            <input type="text" class="form-control" name="name" required value="<?php echo $data['name']; ?>">
                       >
                        </div>

                        <div class="col">
                            <input type="Email" class="form-control" name="email" required value="<?php echo $data['email']; ?>" pattern=".+@gmail\.com" size="30">

                        </div>

                    </div>
                    <div class="row my-2">
                        <div class="col">
                            <input type="text" class="form-control" name="address" required value="<?php echo $data['address']; ?>">
                       
                        </div>

                        <div class="col">
                            <input type="text" class="form-control" name="phone_number" value="<?php echo  $data['contact']; ?> " maxlength="10" required>
           
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-12">
                            <input type="file" class="form-control" name="image">
                        </div>
                    
                    </div>

                    <div class="row  my-4">
                        <div class="col-6">
                            <button type="submit" name="update" class="btn btn-md btn-primary center btn-block" id="updatebtn"> Update your profile</button>

                        </div>

                        <div class="col-6">
                            <a href="update-password.php" class="btn btn-info btn-block text-white">Change your Password</a>

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