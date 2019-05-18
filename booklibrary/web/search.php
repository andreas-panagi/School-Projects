<?php
include('connection.php');
session_start();
include('navbar.php');
?>

<html>
    <head>
    <style>
    p{
        color: #ff6600;
        font-family: monospace;
        font-size: 23px;
        text-align: left;
        font-weight:bold;
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
    </style>

    </head>
</html>

<?php
if(!isset($_GET['query'])){
    echo "no results";
}
 else if(isset($_GET['query'])) {
?>

<table>
    <tr>
    <th>Book ID</th> 
    <th>Author</th> 
    <th>Book Name</th> 
    <th>ISBN</th> 
    <th></th> 

    </tr>

    <?php
//this part is printing all the available books in the database 
    $query = $_GET['query']; 
        // gets value sent over search form
        $bookresults = "SELECT * FROM book WHERE b_name LIKE '%$query%' AND available = 1";    
        $resultbook = mysqli_query($conn, $bookresults);
        while($row = mysqli_fetch_assoc($resultbook)) {
            echo "<tr><td>".  $row["b_id"] . "</td><td>" . $row["author"] . "</td><td>" . $row["b_name"] . "</td><td>" . $row["ISBN"] . "</td><td>" .  "<a href='borrow.php?edit=$row[b_id]'>Borrow</a>" . "</td></tr>" ; 
        }
?> 
</table>
<?php
} else {
    echo "sorry nothing here";
}

    ?>


