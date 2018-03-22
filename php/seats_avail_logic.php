<?php
session_start();
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "complexdb";
$_SESSION['num_tickets'] = $_POST['num_tickets'];
// echo $_SESSION['num_tickets'];

$num_tickets = $_SESSION['num_tickets'];
$showing = $_SESSION['showing'];
$complex = $_SESSION['complex'];
$title = $_SESSION['movie_title'];
$date = $_SESSION['date'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// SQL for grabbing showing ID for purchased reservation
$sql = "select showing_id from Showing where start_time = '$showing' and name = '$complex' and title = '$title' and date_played='$date'";
$get_showingID_query = $conn->query($sql);
$showing_id = mysqli_fetch_array($get_showingID_query)['showing_id']; // Showing ID

// SQL for grabbing number of seats left available for current showing
$num_seats_avail_sql = "SELECT num_seats FROM Showing where showing_id = '$showing_id'";
$get_numseats_query = $conn->query($num_seats_avail_sql);
$num_seats = mysqli_fetch_array($get_numseats_query)['num_seats']; 
$_SESSION['seats_left'] = $num_seats;

//echo $_SESSION['seats_left'];

if ($_SESSION['num_tickets'] > $num_seats) {
    header('Location: ../php/purchase_page.php?' . $_SESSION['showing'] . "?error"); 
} else {
    header('Location: ../php/confirmation.php');
}

$conn->close();
?>