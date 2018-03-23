<?php
$servername = "localhost";
$username = "root";
$passworddb = "";
$dbname = "complexdb";

$company_name = $_POST["company_name"]; 
$phone_num = $_POST["phone_num"]; 
$street_number = $_POST["street_number"]; 
$street_name = $_POST["street_name"]; 
$postal_code =  $_POST["postal_code"];
$contact = $_POST["contact"];


// Create connection
$conn = new mysqli($servername, $username, $passworddb, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
 


$sql = "insert into Supplier (company_name, phone_number, street_name, street_number, postal_code, contact) values
('$company_name','$phone_num','$street_name','$street_number','$postal_code','$contact');";


if ($conn->multi_query($sql) === TRUE) {
    echo "New records created successfully";
    header('Location: ../admin/admin.php'); 
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>
