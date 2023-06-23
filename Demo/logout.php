<?php
session_start();
// if(isset($_SESSION['username'])){
session_unset();
session_destroy();
// }
// else
// {
// echo "<script> widow.location('login.php');</script>"; 
header('location:login.php');
// }
?>


