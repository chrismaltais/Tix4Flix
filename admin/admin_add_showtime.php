<?php
$servername = "localhost";
$username = "root";
$passworddb = "";
$dbname = "complexdb";

$complex_name = $_POST["complex_chosen"]; 
$movie = $_POST["movie_chosen"]; 
$screen_id = $_POST["screen_id"]; 
$num_seats = $_POST["num_seats"]; 
$start_time = $_POST["start_time"]; 
$date = $_POST["date"];

// Create connection
$conn = new mysqli($servername, $username, $passworddb, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "select max(showing_id) from Showing";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $nextid = mysqli_fetch_array($result)['max(showing_id)'] + 1;
}

else {
    $nextmemberid = 1;
}




$sql = "insert into Showing (showing_id, name, screen_id, title, date_played, start_time, num_seats) values
('$nextid','$complex_name','$screen_id', '$movie', '$date', '$start_time','$num_seats')";

if ($conn->multi_query($sql) === TRUE) {
    echo "New records created successfully";
    header('Location: ../admin/admin.php'); 
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>
