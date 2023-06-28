<?php
// include 'includes/header.php';
if (isset($_POST['submit'])) {

  if (isset($_FILES['image'])) {

    $file_name = $_FILES['image']['name'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];

    if (empty($errors) == true) {
      move_uploaded_file($file_tmp, "images/" . $file_name);
      echo "Success";
    } else {
      echo "failed";
    }
  }
}

?>
<form action="" method="post" enctype="multipart/form-data">

  <button id="cameraButton" class="camera-button">
    <i class="bi bi-camera-fill"></i> button
  </button>

  <input type="file" id="fileUpload" name="image" style="display:none">

  <!-- <span class="error"><?php echo $imageErr; ?></span> -->

  <br><br>
  <button type="submit" name="submit">Submit data</button>
</form>



<script>
  // Get the button and file upload elements
  const cameraButton = document.getElementById('cameraButton');
  const fileUpload = document.getElementById('fileUpload');

  // Add event listener to the button
  cameraButton.addEventListener('click', function() {
    // Trigger click event on file upload input
    fileUpload.click();
  });
</script>





<?php
//  if(isset($_FILES['image'])){

//     $file_name = $_FILES['image']['name'];
//     $file_size =$_FILES['image']['size'];
//     $file_tmp =$_FILES['image']['tmp_name'];
//     $file_type=$_FILES['image']['type'];

//     if(empty($errors)==true){
//        move_uploaded_file($file_tmp,"images/".$file_name);
//        echo "Success";
//     }else{
//        print_r($errors);
//     }
//  }
?>
<html>
<!-- <body>
      
      <form action="" method="POST" enctype="multipart/form-data">
         <input type="file" name="image" />
         <input type="submit"/>
      </form>
      
   </body> -->

</html>