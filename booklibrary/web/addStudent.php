<?php    
    include('connection.php');
    session_start();

if ($_SESSION['login_user'] == 'admin') {
//variables from the form
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $name = $_POST["name"];
    $address = $_POST["address"];
    $deparment = $_POST["department"];

       
    
    $insert = "INSERT INTO `student`(`s_id`, `s_username`, `s_password`, `s_name`, `email`, `s_address`, `d_id`) VALUES (NULL,'$username','$password','$name','$email','$address','$deparment')";
    if (!mysqli_query($conn, $insert)){
        echo 'not inserted';
        header ("location: 404.php");
    } else {
        echo 'inserted';
        header ("location: admin.php");
    }
} else {
    header ("location: index.php");
}




?>