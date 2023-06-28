<?php
$connection = mysqli_connect('localhost', 'root', '');

// if(!$connection)
// {
//   echo  "<script>
//     alert('Error');
//     </script>";
// }else
// {
//     echo  "<script>
//     alert('not an error');
//     </script>";
// }

// $conn = mysqli_connect('localhost','root','','tatto_blazers');

$create_db = "CREATE DATABASE `tatto_blazers`";
$run = mysqli_query($connection, $create_db);

if (!$run) {
    echo "<script> alert('Failed to create database');</script>";
} else {
    echo "<script> alert('Databse created Successfully');</script>";
}
