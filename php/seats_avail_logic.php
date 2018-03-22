<?php
session_start();
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "complexdb";
$_SESSION['num_tickets'] = $_POST['num_tickets'];
$num_tickets = $_SESSION['num_tickets'];

$showing = $_SESSION['showing'];
$complex = $_SESSION['complex'];
$title = $_SESSION['movie_title'];           

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// SQL for grabbing showing ID for purchased reservation
$sql = "select showing_id from Showing where start_time = '$showing' and name = '$complex' and title = '$title'";
$get_showingID_query = $conn->query($sql);
$showing_id = mysqli_fetch_array($get_showingID_query)['showing_id']; // Showing ID

// SQL for grabbing number of seats
$num_seats_avail_sql = "SELECT num_seats FROM Showing where showing_id = '$showing'";
$get_numseats_query = $conn->query($num_seats_avail_sql);
$num_seats = mysqli_fetch_array($get_numseats_query)['num_seats']; // Number of seats available

if num_seats()


$_SESSION["user_id"] = mysqli_fetch_array($user_id)['member_id'];
$sql = "SELECT email, _password FROM User_Account where email = '$recemail' and _password = '$recpass' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "email: " . $row["email"]. " - _password: " . $row["_password"].  "<br>";
	echo "You have successfully logged into the database"; 
	header('Location: ../php/home.php'); 
    }
} else {
    echo "0 results";
}
$conn->close();
?>