<?php
    include('connection.php');
    session_start();
    include('navbar.php');
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

    table {
    border-collapse: collapse;
    width: 94%;
    margin-left:3%;
    margin-right:3%;
    color: #000000;
    font-family: arial;
    font-size: 20px;
    text-align: left;
        } 
    th {
    background-color: #ff3333;
    color: white;
        }
    tr:nth-child(even) {background-color: #f2f2f2}

    form{
        margin-left:10px;
    }

    div p{
    
    
        
    }
    </style>

    </head>

<body>


<table>
    <tr>
    <th>Student ID</th> 
    <th>Full Name</th> 
    <th>Email Address</th> 
    <th>Address</th> 
    <th>Department</th> 
    <th></th> 
    <th></th> 

    </tr>

    <?php
    if ($_SESSION['login_user'] == 'admin') {
        $studentresults = "SELECT * FROM student INNER JOIN department USING (d_id) ";    
        $resultstudent = mysqli_query($conn, $studentresults);
        while($row = mysqli_fetch_assoc($resultstudent)) {
            echo "<tr><td>". $row["s_id"] . "</td><td>" . $row["s_name"] . "</td><td>" . $row["email"] . "</td><td>" . $row["s_address"] . "</td><td>" . $row["d_name"] . "</td><td>" .  "<a href='delete.php?delete=$row[s_id]'>Delete</a>". "</td><td>" . "<a href='update.php?update=$row[s_id]'>Edit</a>" . "</td></tr>"; 
        }
        
    } else {
        header("location: index.php");
    }



?> 
</table>

<div>
<hr>
    <form action="addStudent.php" method="post">
	<p>Username: </p>	<input type="text" Name="username" placeholder="Username" required=""> <br> 
    <p>Password: </p>   <input type="password" Name="password" placeholder="Password" required=""> <br>
    <p>Email:   </p> <input type="text" Name="email" placeholder="Email" required=""> <br>
    <p>Full Name: </p>   <input type="text" Name="name" placeholder="Full Name" required=""> <br>
    <p>Address:   </p> <input type="text" Name="address" placeholder="Address" required=""> <br>
    <p>Department:  </p>  <input type="text" Name="department" placeholder="Department ex.1, 2" required=""> <br>
		<input type="submit" value="Submit Student">
    </form>
</div>        

</body>
</html>