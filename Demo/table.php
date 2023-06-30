<?php 
include 'includes/header.php';

$sqlAll = "SELECT * FROM `blazers_data` WHERE `status` = '0' && `id` !='$id'";
$queryAll = mysqli_query($conn, $sqlAll);
$rows1 = mysqli_num_rows($queryAll);
?>

<body>
    <div class="container-fluid my-5">

        <table id="example" class="table table-striped table-bordered center " style="width:100%">
            <thead>

                <tr>
                    <th>User Image</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Contact</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php while ($dataAll = (mysqli_fetch_array($queryAll))) { ?>
                <tr>
                    <td><img src="images/<?php echo $dataAll['user_image']; ?>" alt="" height="40px;" width="40px;" class="rounded-circle"></td>
                    <td><?php echo $dataAll['name']; ?></td>
                    <td><?php echo $dataAll['email']; ?></td>
                    <td><?php echo $dataAll['address']; ?></td>
                    <td><?php echo $dataAll['contact']; ?></td>
                    <td>
                    <a href="user-edit.php?id=<?php echo $dataAll['id']; ?>&email=<?php echo $dataAll['email']; ?>"><button class="btn btn-primary">Edit</button></a>
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