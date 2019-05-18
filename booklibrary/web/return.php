<?php
include('connection.php');
session_start();




if (isset($_SESSION['login_user'])){
$query = $_SESSION['login_user']; 
// gets value sent over search form
$studentresult = "SELECT * FROM student WHERE s_username = '$query'";   
$result = mysqli_query($conn, $studentresult);
while($row = mysqli_fetch_assoc($result)) {
    $sid = $row["s_id"];
}


$date = date_create()->format('Y-M-d');

if (isset($_GET['edit'])){
    $bid= $_GET['edit'];
   $update = "UPDATE book SET available=1 WHERE b_id='$bid'";
   
   if (!mysqli_query($conn, $update)){
        echo 'not updated';
        header ("location: 404.php");
    } else {
    echo 'updated';
    header ("location: thankyou.php");
}
$updatereturn = "UPDATE borrow SET returned=1 WHERE b_id='$bid'";
    if (!mysqli_query($conn, $updatereturn)){
        echo 'not updated';
        header ("location: 404.php");
    } else {
    echo 'updated';
    header ("location: thankyou.php");
}
}
} else {
    header ("location: login.php");
}






?>