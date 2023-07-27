<?php
include 'includes/header.php';
?>

<body>
  <div class="container">
    <a href="add_user.php"><button class="btn  btn-warning btn-block text-white mt-2">Create Team</button></a>
  </div>
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