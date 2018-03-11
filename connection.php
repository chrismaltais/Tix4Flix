<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "theatrecomplexdb";
$recemail = $_POST["email"];                      
$recpass = $_POST["password"];                      

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
 
$sql = "SELECT email, _password FROM user_account where email = '$recemail' and _password = '$recpass' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "email: " . $row["email"]. " - _password: " . $row["_password"].  "<br>";
	echo "You have successfully logged into the database"; 
    }
} else {
    echo "0 results";
}
$conn->close();
?>