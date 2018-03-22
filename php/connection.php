<?php
session_start();
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "complexdb";
$recemail = $_POST["email"];                      
$recpass = $_POST["password"];                      

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Storing session data
$user_id_query = "SELECT member_id FROM Member where email = '$recemail'";
$user_id = $conn->query($user_id_query);
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