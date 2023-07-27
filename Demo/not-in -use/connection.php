<?php
$connection = mysqli_connect('localhost', 'root', '');



$create_db = "CREATE DATABASE `tatto_blazers`";
$run = mysqli_query($connection, $create_db);

if (!$run) {
    echo "<script> alert('Failed to create database');</script>";
} else {
    echo "<script> alert('Databse created Successfully');</script>";
}
