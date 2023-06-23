<?php
$conn = mysqli_connect('localhost','root','','tatto_blazers');

$userId = $_GET['id'];
// echo $userId;
$del = "DELETE FROM `blazers_data` WHERE `id`='$userId'";
$run = mysqli_query($conn,$del);

if(!$run)
    { echo ("<script LANGUAGE='JavaScript'>
        window.alert('Something went wrong please try again');
        window.location.href='table.php';
        </script>");
}
else
{
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('user Deleted Successfully');
    window.location.href='table.php';
    </script>");
}
?>


