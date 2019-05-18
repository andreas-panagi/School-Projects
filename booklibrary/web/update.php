<?php
include('connection.php');
session_start();
include('navbar.php');

if (isset($_SESSION['login_user'])){

    $sid = $_GET['update'];
    $studentresult = "SELECT * FROM student WHERE s_id = '$sid'";   
    $result = mysqli_query($conn, $studentresult);
    $row = mysqli_fetch_assoc($result);
?>
<html>
<head>
<style>
p{
        color: #000000;
        font-family: arial;
        font-size: 15px;
        text-align: left;
        font-weight:bold;
        margin-top: 10px;
    }

form{
    margin-left:10px; 
}

</style>
</head>




<form action="update.php" method="POST">
	<p>Username: </p>	    <input type="text" Name="username" value="<?php echo $row['s_username']; ?>" required=""> <br>
    <p> Password: </p>      <input type="password" Name="password" value="<?php echo $row['s_password']; ?>" required=""> <br>
    <p> Full Name: </p>     <input type="text" Name="name" value="<?php echo $row['s_name']; ?>" required=""> <br>
    <p> Email:    </p>      <input type="text" Name="email" value="<?php echo $row['email']; ?>" required=""> <br>
    <p> Address:    </p>    <input type="text" Name="address" value="<?php echo $row['s_address']; ?>" required=""> <br>
    <p> department: </p>    <input type="text" Name="department" value="<?php echo $row['d_id']; ?>" required=""> <br>
        <input type="hidden" Name="sid" value="<?php echo $row['s_id']; ?>">
		<input type="submit" Name="submit" value="Update Student">
    </form>

<?php

    if (isset($_POST['submit'])){
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $name = $_POST["name"];
        $address = $_POST["address"];
        $deparment = $_POST["department"];
        $newsid = $_POST["sid"];

        
        $update = "UPDATE student SET s_username ='$username', s_password ='$password', s_name ='$name', email ='$email', s_address ='$address', d_id ='$deparment' WHERE s_id = '$newsid'";

        if (!mysqli_query($conn, $update)){
            echo 'not updated';
            header ("location: 404.php");
        } else {
            echo 'updated';
            header ("location: admin.php");
        }
    }
} else {
    header ("location: index.php");
}
?>
</html>