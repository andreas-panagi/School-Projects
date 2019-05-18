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
    $bid = $_GET['edit'];
    $sql = "INSERT INTO `borrow`(`b_id`, `borrow_date`, `borrow_id`, `s_id`) VALUES ('$bid', '$date', NULL, '$sid')";
   
   if (!mysqli_query($conn, $sql)){
       echo 'not inserted';
       header ("location: 404.php");
   } else {
       echo 'inserted';
       header ("location: thank you.php");
   }
   $update = "UPDATE book SET available=0 WHERE b_id='$bid'";
   if (!mysqli_query($conn, $update)){
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