<?php 
// for the header
$sql = "SELECT * FROM `blazers_data` WHERE `id` = '$_SESSION[id];'";
$query = mysqli_query($conn, $sql);


// get data on the table
$sqlAll = "SELECT * FROM `blazers_data` WHERE `status` = '0' && `id` !='$_SESSION[id]' && `user_added_by` = '$_SESSION[username]'";
$queryAll = mysqli_query($conn, $sqlAll);
$rows1 = mysqli_num_rows($queryAll);



?>