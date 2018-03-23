<?php
$servername = "localhost";
$username = "root";
$passworddb = "";
$dbname = "complexdb";

$title = $_POST["title"]; 
$synopsis = $_POST["synopsis"]; 
$run_time = $_POST["run_time"]; 
$rating = $_POST["rating"]; 
$director =  $_POST["director"];
$production_company = $_POST["production_company"];  
$start_date = $_POST["start_date"]; 
$end_date = $_POST["end_date"]; 
$main_actors = $_POST["main_actors"];  

 


// Create connection
$conn = new mysqli($servername, $username, $passworddb, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
 
$sql = "select max(member_id) from member";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $nextmemberid = mysqli_fetch_array($result)['max(member_id)'] + 1;
}

else {
    $nextmemberid = 1;
}


$sql = "insert into Movie (title, plot_synopsis, run_time, rating, director, production_company,
postal_code, phone_number) values
('$email','$password','$fname', '$lname','$streetname',$streetnumber,'$postalcode', '$phonenumber');";


$sql .= "insert into member (member_id, email, card_number, card_expiry) values
($nextmemberid, '$email','$creditcardnumber','$expiration')";



if ($conn->multi_query($sql) === TRUE) {
    echo "New records created successfully";
    header('Location: ../php/home.php'); 
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>
