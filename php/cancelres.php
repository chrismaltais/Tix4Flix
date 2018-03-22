<?php
session_start();
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "complexdb";
                      

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// sql to delete a record
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$actual_link_adj = str_replace("http://localhost/github/php/cancelres.php?", "", $actual_link);

$sql = "DELETE  FROM reservations WHERE reservation_id = '$actual_link_adj' ";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
    header('Location: ../php/newres.php'); 
} else {
    echo "Error deleting record: " . $conn->error;
}

	

$conn->close();
?>