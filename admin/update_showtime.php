<?php
session_start();

$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$sections_of_URL = explode("?", $actual_link);
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "complexdb";
$start_time = $_POST["start_time$sections_of_URL[1]"];                      
$complex = $_POST["complex$sections_of_URL[1]"];                      

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// sql to delete a record



$sql = "UPDATE Showing SET name = '$complex', start_time = '$start_time' WHERE showing_id = '$sections_of_URL[1]'";

echo $sql;
//$sql .= "DELETE FROM Member WHERE member_id = '$sections_of_URL[1]'  and email = '$email';";







//ALTER TABLE `member` DROP FOREIGN KEY `member_ibfk_1`; ALTER TABLE `member` ADD CONSTRAINT `member_ibfk_1` FOREIGN KEY (`email`) REFERENCES `user_account`(`email`) ON DELETE CASCADE ON UPDATE RESTRICT; 


if ($conn->multi_query($sql) === TRUE) {
    echo "Record deleted successfully";
    header('Location: ../admin/edit_showtimes.php'); 
} else {
    echo "Error deleting record: " . $conn->error;
}

	

$conn->close();
?>