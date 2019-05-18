<?php
//SELECT * FROM student INNER JOIN borrow USING (s_id) INNER JOIN book USING (b_id)WHERE s_id = 1
//SELECT * FROM student INNER JOIN borrow USING (s_id) INNER JOIN book USING (b_id)WHERE s_username = "$_SESSION['login_user']";

include('connection.php');
session_start();
include('navbar.php');

if (isset($_SESSION['login_user'])){
?>

<html>
    <head>
    <style>
   /* p{
    color: #000000;
    font-family: arial;
    font-size: 20px;
    text-align: left;
    font-weight:bold;
    margin-left:20px;
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
    */




    </style>

    </head>
    <body>
    <p>Hi, <?php echo $_SESSION['login_user']; ?> these are the books you borrowed:</p>
    </body>
</html>

<table>
    <tr>
    <th>Book ID</th> 
    <th>Book Name</th> 
    <th>ISBN</th> 
    <th>Author</th> 
    <th>Borrowed Date</th>
    <th></th> 
    </tr>

<?php
$query = $_SESSION['login_user']; 
// gets value sent over search form
$bookresult = "SELECT * FROM student INNER JOIN borrow USING (s_id) INNER JOIN book USING (b_id)WHERE s_username = '$query' AND returned=0";   
$result = mysqli_query($conn, $bookresult);
while($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td>".  $row["b_id"] . "</td><td>" . $row["b_name"] . "</td><td>" . $row["ISBN"] . "</td><td>" . $row["author"] . "</td><td>" . $row["borrow_date"] . "</td><td>" .  "<a href='return.php?edit=$row[b_id]'>Return</a>" . "</td></tr>"; 
}
}
?>