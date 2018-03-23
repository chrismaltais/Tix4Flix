<?php
$servername = "localhost";
$username = "root";
$passworddb = "";
$dbname = "complexdb";


$complex = $_POST["complex_chosen"]; 
$phonenumber = $_POST["phone_num"];  
$streetnumber = $_POST["street_number"]; 
$streetname = $_POST["street_name"]; 
$postalcode = $_POST["postal_code"]; 

 


// Create connection
$conn = new mysqli($servername, $username, $passworddb, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
 
$update = "UPDATE Theatre_Complex SET street_number = $streetnumber, street_name = '$streetname', postal_code = '$postalcode', phone_number = '$phonenumber' where name = '$complex'";


if ($conn->multi_query($update) === TRUE) {
    echo "Updated successfully";
    header('Location: ../admin/admin.php'); 
} else {
    echo "Error: " . $update . "<br>" . $conn->error;
}

$conn->close();
?>