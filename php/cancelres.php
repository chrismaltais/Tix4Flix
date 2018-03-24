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
$sections_of_URL = explode("?", $actual_link);

$sql_for_tix = "SELECT num_tickets from Reservations WHERE reservation_id = '$sections_of_URL[1]'";
$result = $conn->query($sql_for_tix);
$seats_cancelled = mysqli_fetch_array($result)['num_tickets'];

$sql = "SELECT reservation_id, Showing.showing_id, num_tickets FROM Reservations INNER JOIN Showing ON Reservations.showing_id = Showing.showing_id WHERE reservation_id = '$sections_of_URL[1]'";
$result = $conn->query($sql);
$showing_id = mysqli_fetch_array($result)['showing_id'];

$sql_update_seats_avail = "UPDATE Showing SET num_seats = num_seats + $seats_cancelled WHERE showing_id = $showing_id ";
$result = $conn->query($sql_update_seats_avail);

$sql = "DELETE FROM Reservations WHERE reservation_id = '$sections_of_URL[1]' ";

echo "Seats cancelled = $seats_cancelled";
echo "Showing ID related to reservation = $showing_id";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
    header('Location: ../php/newres.php'); 
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>