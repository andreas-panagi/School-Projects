<?php
include('connection.php');
session_start();


if (($_SESSION['login_user'] == 'admin')){

    if (isset($_GET['delete'])){
        $sid = $_GET['delete'];
        $sql = "DELETE FROM `student` WHERE s_id = '$sid'";
    
    if (!mysqli_query($conn, $sql)){
        echo 'not Deleted';
        header ("location: 404.php");
    } else {
        echo 'Deleted';
        header ("location: admin.php");
        
        }
    }
} else {
    header ("location: index.php");
}
?>