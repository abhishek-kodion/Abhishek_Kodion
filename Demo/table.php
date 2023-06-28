<?php
include 'includes/header.php';
$sqlAll = "SELECT * FROM `blazers_data` WHERE `status` = '0' && `id` !='$id'";
$queryAll = mysqli_query($conn, $sqlAll);
$rows1 = mysqli_num_rows($queryAll);
?>

<div class="row mt-2">
  <a href="add_user.php"><button class="btn btn-secondary text-white" style="margin-left: 1150px;">Add User</button></a>
</div>
<!-- table  -->
<div class="container text-center">
  <table class="table mt-2">
    <thead class="thead-dark">
      <tr>
        <!-- <th scope="col" >Sr No</th> -->
        <th scope="col">User Image</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Address</th>
        <th scope="col">Contact</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($dataAll = (mysqli_fetch_array($queryAll))) { ?>
        <tr>
          <!-- <th scope="row">1</th> -->
          <td><img src="images/<?php echo $dataAll['user_image']; ?>" alt="" height="40px;" width="40px;" class="rounded-circle"></td>
          <td><?php echo $dataAll['name']; ?></td>
          <td><?php echo $dataAll['email']; ?></td>
          <td><?php echo $dataAll['address']; ?></td>
          <td><?php echo $dataAll['contact']; ?></td>
          <td>
            <a href="user-edit.php?id=<?php echo $dataAll['id']; ?>&email=<?php echo $dataAll['email']; ?>"><button class="btn btn-primary">Edit</button></a>
            <!-- <a href="user-edit-copy.php?id=<?php echo $dataAll['id']; ?>&email=<?php echo $dataAll['email']; ?>"><button class="btn btn-primary">Edit</button></a> -->
            <!-- <a href="delete-user.php?id=<?php echo $dataAll['id']; ?>&type=delete"><button class="btn btn-danger" onclick="return confirmDelete()">Delete</button></a> -->
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" onclick="getDeleteElementId(<?php echo $dataAll['id']; ?>)">
              Delete
            </button>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>



<?php
include 'includes/footer.php';
?>

<!-- <script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete this user?");
        }
</script> -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete the user.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <form action="delete-user.php" method="post">
          <input type="hidden" name="yes" id="delete-btn" value="">
          <button type="submit" name="submit" class="btn btn-primary modal-button">Yes</button>
        </form>
      </div>
    </div>
  </div>
</div>


<script>
  function getDeleteElementId(id) {
    document.getElementById('delete-btn').setAttribute('value', id);
    // console.log(document.getElementById('delete-btn'));  
  }
</script>